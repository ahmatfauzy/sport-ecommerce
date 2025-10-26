@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Header -->
        <div class="text-center mb-8" data-aos="fade-down">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m5.25-3.75a3 3 0 00-3-3H6a3 3 0 00-3 3v1.5c0 .621.504 1.125 1.125 1.125h15.75c.621 0 1.125-.504 1.125-1.125V6z" />
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Payment Successful!</h1>
            <p class="text-lg text-gray-600">Your order has been confirmed and payment processed</p>
        </div>

        <!-- Order Confirmation -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8" data-aos="fade-up">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Order Confirmation</h2>
                <p class="text-gray-600">Thank you for your purchase! Here are your order details:</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Order Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Information</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order ID:</span>
                            <span class="font-semibold">ORD-001</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order Date:</span>
                            <span class="font-semibold">January 20, 2024</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Payment Method:</span>
                            <span class="font-semibold">Credit Card</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Transaction ID:</span>
                            <span class="font-semibold">TXN-ABC123456</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Paid
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Information -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Shipping Information</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-600">Name:</span>
                            <span class="font-semibold block">Budi Santoso</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Address:</span>
                            <span class="font-semibold block">Jl. Merdeka 123, Jakarta</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Phone:</span>
                            <span class="font-semibold block">081234567890</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Estimated Delivery:</span>
                            <span class="font-semibold block">3-5 business days</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Items -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8" data-aos="fade-up" data-aos-delay="100">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Items</h2>
            
            <div class="space-y-4">
                @php
                    $orderItems = [
                        ['name' => 'Nike Air Zoom Pegasus 39', 'qty' => 1, 'price' => 1899000, 'image' => 'https://placehold.co/80x80/EBF8FF/3182CE?text=Nike'],
                        ['name' => 'Jersey Basket Pro DryFit', 'qty' => 2, 'price' => 450000, 'image' => 'https://placehold.co/80x80/FFF5EB/DD6B20?text=Jersey'],
                    ];
                @endphp
                
                @foreach($orderItems as $item)
                <div class="flex items-center space-x-4 p-4 border border-gray-200 rounded-lg">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded-lg">
                    <div class="flex-1">
                        <h3 class="font-semibold text-gray-900">{{ $item['name'] }}</h3>
                        <p class="text-sm text-gray-600">Quantity: {{ $item['qty'] }}</p>
                        <p class="text-sm text-gray-600">Size: 42, Color: Black/White</p>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-gray-900">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Order Summary -->
            <div class="mt-6 pt-6 border-t border-gray-200">
                <div class="space-y-2">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">Rp 2.799.000</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-medium">Rp 15.000</span>
                    </div>
                    <div class="flex justify-between text-sm text-green-600">
                        <span>Discount (WELCOME10)</span>
                        <span>-Rp 279.900</span>
                    </div>
                    <div class="flex justify-between text-lg font-semibold border-t pt-2">
                        <span>Total Paid</span>
                        <span>Rp 2.534.100</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-blue-50 rounded-lg p-6 mb-8" data-aos="fade-up" data-aos-delay="200">
            <h3 class="text-lg font-semibold text-blue-900 mb-4">What's Next?</h3>
            <div class="space-y-3 text-blue-800">
                <div class="flex items-start">
                    <div class="w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                        <span class="text-blue-800 text-xs font-bold">1</span>
                    </div>
                    <div>
                        <p class="font-medium">Order Confirmation Email</p>
                        <p class="text-sm">You'll receive a confirmation email with all order details within the next few minutes.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                        <span class="text-blue-800 text-xs font-bold">2</span>
                    </div>
                    <div>
                        <p class="font-medium">Order Processing</p>
                        <p class="text-sm">We'll prepare your order and update you when it's ready to ship.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                        <span class="text-blue-800 text-xs font-bold">3</span>
                    </div>
                    <div>
                        <p class="font-medium">Shipping Notification</p>
                        <p class="text-sm">You'll receive tracking information once your order ships.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-6 h-6 bg-blue-200 rounded-full flex items-center justify-center mr-3 mt-0.5">
                        <span class="text-blue-800 text-xs font-bold">4</span>
                    </div>
                    <div>
                        <p class="font-medium">Delivery</p>
                        <p class="text-sm">Your order will be delivered within 3-5 business days.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center" data-aos="fade-up" data-aos-delay="300">
            <a href="/orders" class="px-6 py-3 bg-[#3a3a3a] text-white rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300 text-center">
                View My Orders
            </a>
            <a href="/orders/ORD-001" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-300 text-center">
                Track This Order
            </a>
            <a href="/produk" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 transition duration-300 text-center">
                Continue Shopping
            </a>
        </div>

        <!-- Support Information -->
        <div class="mt-8 text-center" data-aos="fade-up" data-aos-delay="400">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Need Help?</h3>
                <p class="text-gray-600 mb-4">If you have any questions about your order, we're here to help!</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="mailto:support@seventeensports.com" class="flex items-center justify-center px-4 py-2 text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                        support@seventeensports.com
                    </a>
                    <a href="tel:+6281234567890" class="flex items-center justify-center px-4 py-2 text-blue-600 hover:text-blue-800">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h.75a.75.75 0 00.75-.75v-4.5a.75.75 0 00-.75-.75h-.75c-4.97 0-9-4.03-9-9a.75.75 0 00-.75-.75H2.25z" />
                        </svg>
                        +62 812-3456-7890
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
