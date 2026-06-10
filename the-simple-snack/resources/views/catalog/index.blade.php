@extends('components.layouts.admin')

@section('content')

<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
    <div>
        <h1 style="color: #f472b6; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Catalog</h1>
        <div class="flex gap-2 mt-3 flex-wrap">
            <a href="{{ route('catalog.index') }}" 
               class="px-4 py-1.5 rounded-full text-xs font-medium {{ !request('category') ? 'bg-pink-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-pink-100' }}">
                Semua
            </a>
            @foreach(['Kue Kering', 'Birthday Cake', 'Snack', 'Bolu'] as $cat)
            <a href="{{ route('catalog.index', ['category' => $cat]) }}" 
               class="px-4 py-1.5 rounded-full text-xs font-medium {{ request('category') == $cat ? 'bg-pink-500 text-white' : 'bg-gray-100 text-gray-600 hover:bg-pink-100' }}">
                {{ ucfirst($cat) }}
            </a>
            @endforeach
        </div>
    </div>

    <a href="{{ route('catalog.create') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg shadow-sm transition flex items-center gap-2">
        <iconify-icon icon="mdi:plus" width="20"></iconify-icon>
        Add Product
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <!-- BARIS FILTER PENCARIAN YANG SUDAH DI-OPTIMASI UNTUK MOBILE -->
    <div class="p-4 border-b flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <form action="{{ route('catalog.index') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto flex-wrap sm:flex-nowrap">
            <!-- Jika sedang memfilter kategori, sertakan kategorinya agar tidak hilang saat mencari -->
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            
            <!-- Lebar disetel w-full di mobile dan w-64 di desktop agar tidak mendorong tombol keluar layar -->
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Search product..." 
                   class="border rounded-lg px-4 py-2 text-sm w-full sm:w-64 focus:ring-2 focus:ring-pink-200 outline-none text-pink-500">
            
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition shadow-sm shrink-0">
                Cari
            </button>
            
            @if(request('search'))
                <a href="{{ route('catalog.index', request('category') ? ['category' => request('category')] : []) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-600 px-3 py-2 rounded-lg text-sm flex items-center justify-center transition shrink-0">
                    Reset
                </a>
            @endif
        </form>

        <div class="text-sm text-gray-400 shrink-0">
            Total: {{ count($products) }} products
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Product</th>
                    <th class="px-6 py-4 text-left">Category</th>
                    <th class="px-6 py-4 text-left">Price</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($products as $product)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 font-medium text-gray-700">
                        {{ $product->name }} </td>
                    
                    <td class="px-6 py-4 text-gray-500 italic">
                        {{ $product->kategori }}
                    </td>

                    <td class="px-6 py-4 text-pink-600 font-semibold">
                        Rp {{ number_format($product->price, 0, ',', '.') }} </td>

                    <td class="px-6 py-4 flex justify-center gap-4">
                        <a href="{{ route('catalog.edit', $product->id) }}" class="text-blue-500 hover:scale-110 transition">
                            <iconify-icon icon="mdi:pencil" width="22"></iconify-icon>
                        </a>

                        <form action="{{ route('catalog.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:scale-110 transition">
                                <iconify-icon icon="mdi:delete" width="22"></iconify-icon>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="py-10 text-center text-gray-400">No products available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection