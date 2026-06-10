<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // 1. Hitung total uang dari database (Finance)
        $totalRevenue = Order::where('status', 'Lunas')->sum('total_harga');

        // 2. Siapkan data untuk Diagram (Chart)
        $financeData = Order::select(
            DB::raw('MONTHNAME(created_at) as bulan'),
            DB::raw('SUM(total_harga) as total')
        )
        ->where('status', 'Lunas')
        ->groupBy('bulan')
        ->get();

        $labels = $financeData->pluck('bulan');
        $totals = $financeData->pluck('total');

        // 3. Kirim ke halaman dashboard
        return view('admin.dashboard', compact('totalRevenue', 'labels', 'totals'));
    }
}