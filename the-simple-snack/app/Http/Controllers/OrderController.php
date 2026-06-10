<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http; // WAJIB DI-IMPORT untuk menembak API Flask

class OrderController extends Controller
{
    public function store(Request $request)
    {
        try {
            // 1. PENGAMANAN CYBER: Validasi ketat menggunakan Regex
            $validated = $request->validate([
                'nama_pembeli'     => ['required', 'string', 'max:50', 'regex:/^[a-zA-Z\s]+$/'],
                'tanggal_pesanan'   => 'required',
                'detail_pesanan'    => 'required|string',
                'total_harga'       => 'required|numeric',
                'catatan'           => 'nullable|string',
            ], [
                'nama_pembeli.regex' => 'Input nama tidak valid! Hanya diperbolehkan huruf dan spasi.',
            ]);

            // 2. Antisipasi XSS: Sterilkan inputan teks dari sisa tag HTML jahat
            $validated['nama_pembeli'] = strip_tags($validated['nama_pembeli']);
            $validated['status'] = 'new';
            
            // Simpan pesanan bersih ke database MySQL
            $order = Order::create($validated);

            // 3. INTEGRASI MACHINE LEARNING: Kirim data transaksi ke Hugging Face Spaces
            try {
                // MENGGUNAKAN DIRECT URL LIVE HUGGING FACE KAMU
                $urlHuggingFace = 'https://dwihesti-thesimplesnack-ai.hf.space/api/recommend';
                
                // Mengirimkan parameter yang dibutuhkan oleh model KNN di Python app.py
                Http::timeout(5)->post($urlHuggingFace, [
                    'user_name' => $order->nama_pembeli,
                    'budget'    => $order->total_harga,
                    'people'    => 1, // Default fallback jika data jumlah orang tidak dikirim form
                    'event'     => $order->catatan ?? 'Arisan' // Menjadikan catatan sebagai acuan jenis event / default Arisan
                ]);
            } catch (\Exception $e) {
                // Mengamankan alur transaksi agar tetap sukses berjalan walaupun server AI sempat RTO/kendala jaringan
                \Log::warning('Sistem AI Hugging Face mengalami RTO / kendala jaringan: ' . $e->getMessage());
            }

            return response()->json([
                'message' => 'Pesanan berhasil disimpan dan sistem rekomendasi diperbarui'
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi Gagal',
                'messages' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Gagal simpan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $orders = Order::when($search, function ($query, $search) {
            return $query->where('nama_pembeli', 'like', "%{$search}%")
                         ->orWhere('id', 'like', "%{$search}%");
        })->latest()->get();

        return view('orders.index', compact('orders')); 
    }

    public function dashboard(Request $request)
    {
        $search = $request->query('search');

        $totalOrders = Order::count();
        $todayOrders = Order::whereDate('created_at', today())->count();
        $totalMenu = Product::count(); 
        $revenue = Order::where('status', 'completed')->sum('total_harga');

        $revenueData = Order::select(
                DB::raw('DATE_FORMAT(created_at, "%a") as hari'),
                DB::raw('SUM(total_harga) as total')
            )
            ->where('status', 'completed')
            ->where('created_at', '>=', now()->subDays(6))
            ->groupBy('hari')
            ->get();

        $revLabels = $revenueData->pluck('hari');
        $revTotals = $revenueData->pluck('total');

        $statusCounts = [
            'new'        => Order::where('status', 'new')->count(),
            'process'    => Order::where('status', 'process')->count(),
            'completed'  => Order::where('status', 'completed')->count(),
        ];

        $recentOrders = Order::when($search, function($query, $search) {
                return $query->where('nama_pembeli', 'like', "%{$search}%");
            })->latest()->limit(5)->get();

        return view('dashboard', compact(
            'totalOrders', 'todayOrders', 'totalMenu', 'revenue', 
            'revLabels', 'revTotals', 'statusCounts', 'recentOrders'
        ));
    }

    public function process($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'process']);
        return back()->with('success', 'Pesanan sedang diproses!');
    }

    public function complete($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'completed';
        $order->save();

        return back()->with('success', 'Pesanan berhasil diselesaikan!');
    }

    public function finance(Request $request)
    {
        $search = $request->search;

        $completedOrders = Order::where('status', 'completed')
            ->when($search, function($query, $search) {
                return $query->where('nama_pembeli', 'like', "%{$search}%");
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        $totalRevenue = $completedOrders->sum('total_harga');
        $totalTransactions = $completedOrders->count();

        return view('finance.index', compact('completedOrders', 'totalRevenue', 'totalTransactions'));
    }
    public function getRecommendation(Request $request)
{
    // 1. Tangkap data dari form input Blade
    $budget = $request->input('budget', 0);
    $people = $request->input('people', 1);
    $event  = $request->input('Rapat', 'Arisan', 'Hantaran', 'Ulang Tahun');

    // 2. Tembak ke URL Hugging Face yang sudah aktif kemarin
    $urlHuggingFace = 'https://dwihesti-thesimplesnack-ai.hf.space/api/recommend';

    try {
        $response = Http::timeout(10)->post($urlHuggingFace, [
            'budget' => (int)$budget,
            'people' => (int)$people,
            'event'  => $event
        ]);

        if ($response->successful()) {
            return response()->json($response->json(), 200);
        }
        
        return response()->json([
            'status' => 'error',
            'message' => 'Gagal mendapatkan respon valid dari server AI.'
        ], 500);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Koneksi AI Terputus: ' . $e->getMessage()
        ], 500);
    }
}
}