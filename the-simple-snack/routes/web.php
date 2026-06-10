<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| PUBLIC (Akses Pembeli)
|--------------------------------------------------------------------------
*/

// Halaman utama memanggil pembeliIndex agar data produk & filter kategori muncul
Route::get('/', [ProductController::class, 'pembeliIndex'])->name('pembeli.catalog');

// Simpan pesanan tetap di luar auth agar pembeli bisa belanja
Route::post('/simpan-pesanan', [OrderController::class, 'store'])->name('pesanan.store');

Route::post('/testimoni/simpan', [ProductController::class, 'storeTestimony'])->name('testimony.store');

/*
|--------------------------------------------------------------------------
| PROTECTED (Akses Admin - Wajib Login)
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/dashboard', [OrderController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ORDERS
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{id}/process', [OrderController::class, 'process'])->name('orders.process');
    Route::post('/orders/{id}/complete', [OrderController::class, 'complete'])->name('orders.complete');

    // CATALOG ADMIN (Manajemen Produk)

    Route::get('/catalog', [ProductController::class, 'index'])->name('catalog.index');
    Route::get('/catalog/create', [ProductController::class, 'create'])->name('catalog.create'); 
    Route::post('/catalog/store', [ProductController::class, 'store'])->name('catalog.store');   
    Route::get('/catalog/{id}/edit', [ProductController::class, 'edit'])->name('catalog.edit');
    Route::put('/catalog/{id}', [ProductController::class, 'update'])->name('catalog.update');
    Route::delete('/catalog/{id}', [ProductController::class, 'destroy'])->name('catalog.destroy');

    // FINANCE
    Route::get('/finance', [OrderController::class, 'finance'])->name('finance.index');

    
});

require __DIR__.'/auth.php';