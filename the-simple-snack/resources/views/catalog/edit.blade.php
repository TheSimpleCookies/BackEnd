@extends('components.layouts.admin')

@section('content')

<style>
    input, select, textarea {
        background-color: #fff5f8 !important;
        color: #ec4899 !important;
        border: 1px solid #f9a8d4 !important;
        border-radius: 12px !important;
        padding: 10px 15px !important;
    }
    input[type="file"]::file-selector-button {
        background: #ec4899;
        color: white;
        border: none;
        padding: 5px 15px;
        border-radius: 8px;
        cursor: pointer;
    }
</style>

<div class="mb-6">
    <a href="{{ route('catalog.index') }}" class="text-pink-500 text-sm hover:underline">← Kembali</a>
    <h1 class="text-2xl font-semibold text-gray-800 mt-2">Edit Produk: {{ $product->nama_produk }}</h1>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 max-w-2xl">
    <form action="{{ route('catalog.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" required 
                       class="w-full border-gray-200 rounded-xl focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ $product->harga }}" required 
                           class="w-full border-gray-200 rounded-xl focus:ring-pink-500 focus:border-pink-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="category" class="w-full border-pink-200 rounded-xl focus:ring-pink-500 focus:border-pink-500" style="background-color: #fff5f8; color: #ec4899; padding: 10px;">
                        <option value="Kue Kering" {{ $product->category == 'Kue Kering' ? 'selected' : '' }}>Kue Kering</option>
                        <option value="Birthday Cake" {{ $product->category == 'Birthday Cake' ? 'selected' : '' }}>Birthday Cake</option>
                        <option value="Snack" {{ $product->category == 'Snack' ? 'selected' : '' }}>Snack</option>
                        <option value="Bolu" {{ $product->category == 'Bolu' ? 'selected' : '' }}>Bolu</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" 
                          class="w-full border-gray-200 rounded-xl focus:ring-pink-500 focus:border-pink-500">{{ $product->description }}</textarea>
            </div>

            <div class="flex flex-col md:flex-row gap-4 items-start">
                <div class="flex-1 w-full">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Foto (Kosongkan jika tidak ganti)</label>
                    <input type="file" name="image" class="w-full text-sm text-gray-500">
                </div>
                
                @if($product->image)
                <div class="shrink-0">
                    <p class="text-xs text-gray-400 mb-1 text-center">Foto Saat Ini</p>
                    <img src="{{ asset('assets/img/' . $product->image) }}" 
                         class="w-24 h-24 object-cover rounded-xl border-2 border-pink-100 shadow-sm">
                </div>
                @endif
            </div>

            <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-xl font-semibold hover:bg-pink-600 transition shadow-lg shadow-pink-200">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection