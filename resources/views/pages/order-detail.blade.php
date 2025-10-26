@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Back Button -->
        <div class="mb-6" data-aos="fade-right">
            <a href="/orders" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>
                Back to Orders
            </a>
        </div>

        <!-- Order Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6" data-aos="fade-up">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Order #ORD-001</h1>
                    <p class="text-gray-600 mt-1">Placed on January 20, 2024</p>
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
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        Pending
                    </span>
                    <p class="text-2xl font-bold text-gray-900 mt-2">Rp 2.814.000</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Order Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6 mb-6" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Items</h2>
                    
                    @php
                        $orderItems = [
                            [
                                'name' => 'Nike Air Zoom Pegasus 39',
                                'qty' => 1,
                                'price' => 1899000,
                                'image' => 'https://placehold.co/100x100/EBF8FF/3182CE?text=Nike',
                                'description' => 'Running shoes with responsive cushioning'
                            ],
                            [
                                'name' => 'Jersey Basket Pro DryFit',
                                'qty' => 2,
                                'price' => 450000,
                                'image' => 'https://placehold.co/100x100/FFF5EB/DD6B20?text=Jersey',
                                'description' => 'Professional basketball jersey'
                            ],
                        ];
                    @endphp
                    
                    <div class="space-y-4">
                        @foreach($orderItems as $item)
                        <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="font-semibold text-gray-900">{{ $item['name'] }}</h3>
                                <p class="text-sm text-gray-600 mt-1">{{ $item['description'] }}</p>
                                <p class="text-sm text-gray-500 mt-1">Quantity: {{ $item['qty'] }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">Rp {{ number_format($item['price'], 0, ',', '.') }} each</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Order Timeline -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Timeline</h2>
                    
                    @php
                        $timeline = [
                            ['status' => 'Order Placed', 'date' => '2024-01-20 10:30', 'completed' => true],
                            ['status' => 'Payment Confirmed', 'date' => '2024-01-20 10:35', 'completed' => true],
                            ['status' => 'Processing', 'date' => '2024-01-20 14:00', 'completed' => true],
                            ['status' => 'Shipped', 'date' => null, 'completed' => false],
                            ['status' => 'Delivered', 'date' => null, 'completed' => false],
                        ];
                    @endphp
                    
                    <div class="space-y-4">
                        @foreach($timeline as $index => $step)
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                @if($step['completed'])
                                <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                </div>
                                @else
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                    <span class="text-gray-600 text-sm font-medium">{{ $index + 1 }}</span>
                                </div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="font-medium text-gray-900">{{ $step['status'] }}</p>
                                @if($step['date'])
                                <p class="text-sm text-gray-500">{{ $step['date'] }}</p>
                                @else
                                <p class="text-sm text-gray-400">Pending</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary & Shipping -->
            <div class="lg:col-span-1">
                <!-- Order Summary -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6" data-aos="fade-up" data-aos-delay="300">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Summary</h2>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal (2 items)</span>
                            <span class="font-medium">Rp 2.799.000</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">Rp 15.000</span>
                        </div>
                        <div class="flex justify-between border-t pt-3">
                            <span class="text-lg font-semibold text-gray-900">Total</span>
                            <span class="text-lg font-semibold text-gray-900">Rp 2.814.000</span>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6" data-aos="fade-up" data-aos-delay="400">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Shipping Information</h2>
                    
                    <div class="space-y-2 text-sm">
                        <div>
                            <span class="font-medium text-gray-700">Name:</span>
                            <span class="text-gray-600">Budi Santoso</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Phone:</span>
                            <span class="text-gray-600">081234567890</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Address:</span>
                            <span class="text-gray-600">Jl. Merdeka 123, Jakarta</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Shipping Method:</span>
                            <span class="text-gray-600">Standard Delivery</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Estimated Delivery:</span>
                            <span class="text-gray-600">3-5 business days</span>
                        </div>
                    </div>
                </div>

                <!-- Payment Information -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-up" data-aos-delay="500">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Payment Information</h2>
                    
                    <div class="space-y-2 text-sm">
                        <div>
                            <span class="font-medium text-gray-700">Payment Method:</span>
                            <span class="text-gray-600">Credit Card (****1234)</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Payment Status:</span>
                            <span class="text-green-600 font-medium">Paid</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Transaction ID:</span>
                            <span class="text-gray-600">TXN-ABC123456</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="600">
            <button class="px-6 py-2 text-red-600 border border-red-600 rounded-md hover:bg-red-50">
                Cancel Order
            </button>
            <button class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                Contact Support
            </button>
            <button class="px-6 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                Download Invoice
            </button>
        </div>
    </div>
</div>
@endsection
