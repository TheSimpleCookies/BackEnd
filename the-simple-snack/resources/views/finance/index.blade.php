@extends('components.layouts.admin')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800 text-pink-500">Finance Report</h1>
    <p class="text-gray-500 text-sm">Rekap pendapatan dari pesanan yang sudah selesai.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-green-50 text-green-600 rounded-xl">
                <iconify-icon icon="mdi:cash-multiple" width="32"></iconify-icon>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Total Pendapatan</p>
                <h3 class="text-2xl font-bold text-gray-800">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl border border-pink-100 shadow-sm">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-pink-50 text-pink-600 rounded-xl">
                <iconify-icon icon="mdi:check-decagram" width="32"></iconify-icon>
            </div>
            <div>
                <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Pesanan Selesai</p>
                <h3 class="text-2xl font-bold text-gray-800">{{ $totalTransactions }} <span class="text-sm font-normal text-gray-400 font-medium">Transaksi</span></h3>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="p-4 border-b bg-gray-50">
        <h3 class="font-semibold text-gray-700">Riwayat Transaksi</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4 text-left">Tanggal</th>
                    <th class="px-6 py-4 text-left">Pelanggan</th>
                    <th class="px-6 py-4 text-right">Nominal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($completedOrders as $order)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 text-gray-500">
                        {{ $order->updated_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-700">
                        {{ $order->nama_pembeli }}
                    </td>
                    <td class="px-6 py-4 text-right text-green-600 font-bold">
                        + Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-10 text-center text-gray-400 italic">
                        Belum ada pesanan yang diselesaikan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection