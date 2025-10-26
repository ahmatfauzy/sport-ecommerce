@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <header class="mb-8" data-aos="fade-down">
            <h1 class="text-4xl font-bold text-gray-800">My Orders</h1>
            <p class="mt-2 text-lg text-gray-600">Track your order history and status</p>
        </header>

        <!-- Orders List -->
        <div class="space-y-6">
            @php
                $orders = [
                    [
                        'id' => 'ORD-001',
                        'date' => '2024-01-20',
                        'status' => 'pending',
                        'total' => 2450000,
                        'items' => [
                            ['name' => 'Nike Air Zoom Pegasus 39', 'qty' => 1, 'price' => 1899000, 'image' => 'https://placehold.co/80x80/EBF8FF/3182CE?text=Nike'],
                            ['name' => 'Jersey Basket Pro DryFit', 'qty' => 2, 'price' => 450000, 'image' => 'https://placehold.co/80x80/FFF5EB/DD6B20?text=Jersey'],
                        ]
                    ],
                    [
                        'id' => 'ORD-002',
                        'date' => '2024-01-19',
                        'status' => 'processing',
                        'total' => 1899000,
                        'items' => [
                            ['name' => 'Adidas Ultraboost Light', 'qty' => 1, 'price' => 1899000, 'image' => 'https://placehold.co/80x80/E6FFFA/38B2AC?text=Adidas'],
                        ]
                    ],
                    [
                        'id' => 'ORD-003',
                        'date' => '2024-01-18',
                        'status' => 'shipped',
                        'total' => 800000,
                        'items' => [
                            ['name' => 'Dumbbell Set 10kg', 'qty' => 1, 'price' => 350000, 'image' => 'https://placehold.co/80x80/F7FAFC/718096?text=Dumbbell'],
                            ['name' => 'Yoga Mat Premium', 'qty' => 1, 'price' => 250000, 'image' => 'https://placehold.co/80x80/F0FFF4/38A169?text=Yoga'],
                        ]
                    ],
                    [
                        'id' => 'ORD-004',
                        'date' => '2024-01-17',
                        'status' => 'delivered',
                        'total' => 1200000,
                        'items' => [
                            ['name' => 'Bola Basket Indoor Pro', 'qty' => 1, 'price' => 320000, 'image' => 'https://placehold.co/80x80/FAF5FF/805AD5?text=Bola'],
                            ['name' => 'Sepatu Running Pro', 'qty' => 1, 'price' => 799000, 'image' => 'https://placehold.co/80x80/EBF8FF/3182CE?text=Sepatu'],
                        ]
                    ],
                ];
            @endphp

            @foreach($orders as $index => $order)
            <div class="bg-white rounded-lg shadow-md overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <!-- Order Header -->
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Order #{{ $order['id'] }}</h3>
                            <p class="text-sm text-gray-600">Placed on {{ $order['date'] }}</p>
                        </div>
                        <div class="text-right">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800',
                                    'processing' => 'bg-blue-100 text-blue-800',
                                    'shipped' => 'bg-purple-100 text-purple-800',
                                    'delivered' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$order['status']] }}">
                                {{ ucfirst($order['status']) }}
                            </span>
                            <p class="text-lg font-semibold text-gray-900 mt-1">Rp {{ number_format($order['total'], 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="px-6 py-4">
                    <div class="space-y-3">
                        @foreach($order['items'] as $item)
                        <div class="flex items-center space-x-4">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-lg">
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">{{ $item['name'] }}</h4>
                                <p class="text-sm text-gray-600">Quantity: {{ $item['qty'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Actions -->
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-3">
                            <button onclick="viewOrderDetail('{{ $order['id'] }}')" class="text-blue-600 hover:text-blue-800 font-medium">
                                View Details
                            </button>
                            @if($order['status'] === 'delivered')
                            <button class="text-green-600 hover:text-green-800 font-medium">
                                Reorder
                            </button>
                            @endif
                        </div>
                        <div class="flex space-x-3">
                            @if($order['status'] === 'pending')
                            <button class="px-4 py-2 text-red-600 border border-red-600 rounded-md hover:bg-red-50">
                                Cancel Order
                            </button>
                            @endif
                            @if($order['status'] === 'delivered')
                            <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Leave Review
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Empty State -->
        @if(count($orders) === 0)
        <div class="text-center bg-white p-12 rounded-lg shadow-md" data-aos="fade-up">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">No Orders Yet</h2>
            <p class="text-gray-600 mb-6">You haven't placed any orders yet. Start shopping to see your orders here.</p>
            <a href="/produk" class="inline-block px-6 py-2 bg-[#3a3a3a] text-white font-semibold rounded-lg shadow-md hover:bg-[#2c2c2c] transition">
                Start Shopping
            </a>
        </div>
        @endif

        <!-- Pagination -->
        @if(count($orders) > 0)
        <div class="mt-8 flex justify-center" data-aos="fade-up">
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">1</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">2</a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">3</a>
                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    function viewOrderDetail(orderId) {
        // Redirect to order detail page
        window.location.href = `/orders/${orderId}`;
    }
</script>
@endpush
@endsection
