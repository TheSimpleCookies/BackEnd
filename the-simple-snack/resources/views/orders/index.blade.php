@extends('components.layouts.admin') 

@section('content')
    <h1 style="color: #f472b6; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Orders</h1>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                        <th class="px-6 py-4 text-left">Detail</th>
                        <th class="px-6 py-4 text-left">Total</th>
                        <th class="px-6 py-4 text-left">Status</th>
                        <th class="px-6 py-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $order->nama_pembeli }}</td>
                        <td class="px-6 py-4">{{ $order->tanggal_pesanan }}</td>
                        <td class="px-6 py-4">
                            @php $items = json_decode($order->detail_pesanan, true); @endphp
                            @if(is_array($items))
                                @foreach($items as $item)
                                    <div>• {{ $item['name'] }} ({{ $item['qty'] }})</div>
                                @endforeach
                            @else
                                {{ $order->detail_pesanan }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-green-600 font-semibold">
                            Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4">
                            @if($order->status == 'new')
                                <span class="px-3 py-1 bg-pink-100 text-pink-500 text-xs rounded-full">New</span>
                            @elseif($order->status == 'process')
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-600 text-xs rounded-full">Process</span>
                            @else
                                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs rounded-full">Completed</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 flex justify-center gap-3">
                            @if($order->status == 'new')
                            <form action="{{ route('orders.process', $order->id) }}" method="POST">
                                @csrf
                                <button class="text-yellow-500"><iconify-icon icon="mdi:progress-clock" width="22"></iconify-icon></button>
                            </form>
                            @endif

                           @if($order->status != 'completed')
                            <form action="{{ route('orders.complete', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="text-green-600 hover:scale-110 transition">
                                <iconify-icon icon="mdi:check-circle" width="22"></iconify-icon>
                            </button>
                        </form>
                        @endif

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-10 text-gray-400">Tidak ada data pesanan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection