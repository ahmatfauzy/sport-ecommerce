@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Payment Header -->
        <div class="text-center mb-8" data-aos="fade-down">
            <h1 class="text-4xl font-bold text-gray-800">Payment</h1>
            <p class="mt-2 text-lg text-gray-600">Complete your payment securely</p>
        </div>

        <!-- Payment Status -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8" data-aos="fade-up">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Payment Pending</h2>
                <p class="text-gray-600">Please complete your payment to confirm your order</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Payment Methods -->
            <!-- Midtrans Payment -->
            <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-up">
                <div id="midtrans-snap-container"></div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24" data-aos="fade-left">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Summary</h2>
                    
                    <!-- Order Info -->
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Order ID:</span>
                            <span class="font-semibold">{{ $order->number }}</span>
                        </div>
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-600">Date:</span>
                            <span class="font-semibold">{{ $order->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="space-y-3 mb-6 max-h-96 overflow-y-auto">
                        @foreach($order->items as $item)
                        <div class="flex items-center space-x-3">
                            <img src="{{ $item->product->image_url }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="w-16 h-16 object-cover rounded">
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900">{{ $item->product->name }}</h4>
                                <p class="text-xs text-gray-600">Qty: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-sm">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Order Totals -->
                    <div class="space-y-2 border-t pt-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium">Rp 15.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-lg font-semibold border-t pt-2">
                            <span>Total</span>
                            <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    
                    <!-- Payment Instructions -->
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-semibold text-blue-900 mb-2">Payment Instructions</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Complete payment within 24 hours</li>
                            <li>• Keep your payment receipt</li>
                            <li>• You will receive confirmation via email</li>
                            <li>• Contact support if you have issues</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Security -->
        <div class="mt-8 text-center" data-aos="fade-up">
            <div class="flex items-center justify-center space-x-6 text-sm text-gray-600">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m5.25-3.75a3 3 0 00-3-3H6a3 3 0 00-3 3v1.5c0 .621.504 1.125 1.125 1.125h15.75c.621 0 1.125-.504 1.125-1.125V6z" />
                    </svg>
                    SSL Secured
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                    PCI Compliant
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-purple-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    24/7 Support
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
<script>
    // Initialize Midtrans Snap
    window.snap.pay('{{ $transaction->snap_token }}', {
        onSuccess: function(result) {
            console.log('Payment success:', result);
            // Redirect to success page
            window.location.href = '/orders?success=true';
        },
        onPending: function(result) {
            console.log('Payment pending:', result);
            window.location.href = '/orders?pending=true';
        },
        onError: function(result) {
            console.log('Payment error:', result);
            alert('Payment failed. Please try again.');
        },
        onClose: function() {
            console.log('Payment modal closed');
        }
    });
</script>
@endpush
@endsection
