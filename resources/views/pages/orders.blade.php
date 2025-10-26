@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-black">Pesanan Saya</h1>
            <p class="text-gray-600">Lihat dan kelola pesanan Anda</p>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Pesanan #{{ $order->id }}</h3>
                            <p class="text-sm text-gray-600">Tanggal: {{ $order->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                                @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                @elseif($order->status === 'delivered') bg-green-100 text-green-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-600">Total Pesanan</p>
                            <p class="font-semibold text-gray-900">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Metode Pembayaran</p>
                            <p class="font-semibold text-gray-900">{{ ucfirst($order->payment_method ?? 'N/A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Alamat Pengiriman</p>
                            <p class="font-semibold text-gray-900">{{ $order->shipping_address ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <!-- Order Items -->
                    @if($order->orderItems && $order->orderItems->count() > 0)
                    <div class="border-t pt-4">
                        <h4 class="font-medium text-gray-900 mb-3">Item Pesanan:</h4>
                        <div class="space-y-2">
                            @foreach($order->orderItems as $item)
                            <div class="flex items-center space-x-3">
                                <img src="{{ $item->product->images[0] ?? 'https://via.placeholder.com/50x50' }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="w-12 h-12 object-cover rounded">
                                <div class="flex-1">
                                    <p class="font-medium text-gray-900">{{ $item->product->name }}</p>
                                    <p class="text-sm text-gray-600">Qty: {{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-gray-900">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="flex justify-end mt-4">
                        <a href="/orders/{{ $order->id }}" 
                           class="bg-black text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-800 transition duration-300">
                            Lihat Detail
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($orders->hasPages())
            <div class="mt-8 flex justify-center">
                {{ $orders->links() }}
            </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-12">
                <div class="w-24 h-24 bg-gray-200 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada pesanan</h3>
                <p class="text-gray-600 mb-6">Mulai berbelanja untuk melihat pesanan Anda di sini</p>
                <a href="/produk" 
                   class="bg-black text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-800 transition duration-300">
                    Mulai Berbelanja
                </a>
            </div>
        @endif
    </div>
</div>
@endsection