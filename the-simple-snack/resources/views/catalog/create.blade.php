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
        background: #ec4899; color: white; border: none;
        padding: 5px 15px; border-radius: 8px; cursor: pointer;
    }
</style>

<div class="mb-6">
    <a href="{{ route('catalog.index') }}" class="text-pink-500 text-sm hover:underline">← Kembali</a>
    <h1 class="text-2xl font-semibold text-gray-800 mt-2">Tambah Produk Baru</h1>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 max-w-2xl">
    
    <!-- BANNER PENGADUAN ERROR (Biar temenmu tahu persis jika ada inputan yang ditolak Laravel) -->
    @if ($errors->any())
        <div style="background-color: #fee2e2; border: 1px solid #fca5a5; color: #b91c1c; padding: 12px; margin-bottom: 20px; font-size: 14px; border-radius: 8px;">
            <p style="font-weight: bold; margin-bottom: 5px;">⚠️ Gagal Menambahkan Produk:</p>
            <ul style="list-style-type: disc; margin-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('catalog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <!-- name="nama_produk" disinkronkan dengan Controller -->
                <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" required placeholder="Contoh: Choco Brownies" class="w-full focus:ring-pink-500 focus:border-pink-500">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                    <!-- name="harga" disinkronkan dengan Controller -->
                    <input type="number" name="harga" value="{{ old('harga') }}" required placeholder="45000" class="w-full focus:ring-pink-500 focus:border-pink-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select name="kategori" required class="w-full focus:ring-pink-500 focus:border-pink-500">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Kue Kering" {{ old('kategori') == 'Kue Kering' ? 'selected' : '' }}>Kue Kering</option>
                        <option value="Birthday Cake" {{ old('kategori') == 'Birthday Cake' ? 'selected' : '' }}>Birthday Cake</option>
                        <option value="Snack" {{ old('kategori') == 'Snack' ? 'selected' : '' }}>Snack</option>
                        <option value="Bolu" {{ old('kategori') == 'Bolu' ? 'selected' : '' }}>Bolu</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="3" placeholder="Detail produk..." class="w-full focus:ring-pink-500 focus:border-pink-500">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Produk</label>
                <input type="file" name="image" required class="w-full text-sm text-gray-500">
            </div>

            <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-xl font-semibold hover:bg-pink-600 transition shadow-lg">
                Simpan Produk Baru
            </button>
        </div>
    </form>
</div>
@endsection