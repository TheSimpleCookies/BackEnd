<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;
use App\Models\Testimony;


class ProductController extends Controller
{

    public function index(Request $request) {
    $search = $request->search;

    $products = Product::when($search, function($query, $search) {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('kategori', 'like', "%{$search}%");
    })->get();

    return view('catalog.index', compact('products'));
    }

    public function create()
    {
    // Ini untuk buka halaman form tambah produk
    return view('catalog.create');
    }

     public function store(Request $request)
        {
        // 1. Validasi Input
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'kategori'    => 'required',
            'description' => 'nullable|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg|max:2048', // Pastikan wajib diisi
        ]);

        // 2. Inisialisasi Model
        $product = new \App\Models\Product();
        $product->name        = $request->name;
        $product->price       = $request->price;
        $product->kategori    = $request->kategori;
        $product->description = $request->description;

    
        if ($request->hasFile('image')) {
            $file = $request->file('image'); // Ambil file-nya dulu
            $imageName = time() . '.' . $file->getClientOriginalExtension(); 
            
            // Simpan ke folder public/assets/img
            $file->move(base_path('../public_html/assets/img'), $imageName);
            
            // Simpan nama file ke database
            $product->image = $imageName;
        }

        //  Simpan ke Database
        $product->save();

        return redirect()->route('catalog.index')->with('success', 'Produk berhasil ditambahkan!');
        }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('catalog.edit', compact('product'));
         }

    public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    // 1. Validasi (Nama di kiri adalah nama 'name' di tag <input> Blade)
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // 2. Logika Upload Gambar ke assets/img
    if ($request->hasFile('image')) {
        // 1. UBAH BAGIAN INI (Agar mencari file lama di public_html)
        $oldImagePath = base_path('../public_html/assets/img/' . $product->image);
        if (file_exists($oldImagePath) && $product->image) {
            unlink($oldImagePath);
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        
        // 2. UBAH BAGIAN INI (Agar memindahkan file baru ke public_html)
        $image->move(base_path('../public_html/assets/img'), $imageName);
        
        $product->image = $imageName;
    }

    $product->name = $request->nama_produk; 
    $product->price = $request->harga;      
    $product->kategori = $request->category;
    $product->description = $request->description;
    
    $product->save();

    return redirect()->route('catalog.index')->with('success', 'Produk berhasil diperbarui!');
}
   public function pembeliIndex(Request $request)
    {
        $category = $request->query('category');

            if ($category) {
                $products = Product::where('kategori', $category)->get();
            } else {
                $products = Product::all();
            }

        return view('welcome', compact('products'));
        }

         public function destroy($id)
        {
            // 1. Cari produknya
            $product = Product::findOrFail($id);
    
            // 2. Hapus file gambar di folder public_html agar storage cPanel tidak penuh
            if ($product->image && file_exists(base_path('../public_html/assets/img/' . $product->image))) {
                unlink(base_path('../public_html/assets/img/' . $product->image));
            }
    
            // 3. Hapus data dari database
            $product->delete();
    
            // 4. Balik lagi ke halaman katalog dengan pesan sukses
            return redirect()->route('catalog.index')->with('success', 'Produk berhasil dihapus!');
        }

    public function storeTestimony(Request $request)
        {
            // 1. Validasi input
            $request->validate([
                'nama' => 'required',
                'rating' => 'required|numeric|min:1|max:5',
                'pesan' => 'required',
            ]);

            // 2. Simpan ke database
            Testimony::create([
                'nama' => $request->nama,
                'rating' => $request->rating,
                'pesan' => $request->pesan,
            ]);

            // 3. Kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->back()->with('success', 'Testimoni berhasil dikirim!');
        }

        
}