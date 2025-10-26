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
            <div class="space-y-6">
                
                <!-- Credit Card Payment -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-right">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Credit/Debit Card</h3>
                    
                    <form id="cardPaymentForm" class="space-y-4">
                        <div>
                            <label for="cardNumber" class="block text-sm font-medium text-gray-700 mb-1">Card Number</label>
                            <input type="text" id="cardNumber" placeholder="1234 5678 9012 3456" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="19">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="expiryDate" class="block text-sm font-medium text-gray-700 mb-1">Expiry Date</label>
                                <input type="text" id="expiryDate" placeholder="MM/YY" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="5">
                            </div>
                            <div>
                                <label for="cvv" class="block text-sm font-medium text-gray-700 mb-1">CVV</label>
                                <input type="text" id="cvv" placeholder="123" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="4">
                            </div>
                        </div>
                        
                        <div>
                            <label for="cardName" class="block text-sm font-medium text-gray-700 mb-1">Cardholder Name</label>
                            <input type="text" id="cardName" placeholder="John Doe" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            Pay with Card
                        </button>
                    </form>
                </div>

                <!-- Bank Transfer -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-right" data-aos-delay="100">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Bank Transfer</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Select Bank</label>
                            <div class="grid grid-cols-2 gap-3">
                                <button onclick="selectBank('bca')" class="bank-option p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition">
                                    <div class="font-semibold">BCA</div>
                                    <div class="text-sm text-gray-600">Bank Central Asia</div>
                                </button>
                                <button onclick="selectBank('mandiri')" class="bank-option p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition">
                                    <div class="font-semibold">Mandiri</div>
                                    <div class="text-sm text-gray-600">Bank Mandiri</div>
                                </button>
                                <button onclick="selectBank('bni')" class="bank-option p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition">
                                    <div class="font-semibold">BNI</div>
                                    <div class="text-sm text-gray-600">Bank Negara Indonesia</div>
                                </button>
                                <button onclick="selectBank('bri')" class="bank-option p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition">
                                    <div class="font-semibold">BRI</div>
                                    <div class="text-sm text-gray-600">Bank Rakyat Indonesia</div>
                                </button>
                            </div>
                        </div>
                        
                        <div id="bankDetails" class="hidden">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h4 class="font-semibold text-gray-900 mb-2">Transfer Details</h4>
                                <div class="space-y-2 text-sm">
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Account Number:</span>
                                        <span class="font-mono font-semibold" id="accountNumber">1234567890</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Account Name:</span>
                                        <span class="font-semibold">Seventeen Sports</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="text-gray-600">Amount:</span>
                                        <span class="font-semibold">Rp 2.814.000</span>
                                    </div>
                                </div>
                            </div>
                            
                            <button onclick="confirmBankTransfer()" class="w-full mt-4 bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                                Confirm Bank Transfer
                            </button>
                        </div>
                    </div>
                </div>

                <!-- E-Wallet -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-right" data-aos-delay="200">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">E-Wallet</h3>
                    
                    <div class="space-y-3">
                        <button onclick="payWithEwallet('gopay')" class="w-full p-4 border border-gray-300 rounded-lg text-left hover:border-blue-500 hover:bg-blue-50 transition">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-green-600 font-bold text-lg">G</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">GoPay</div>
                                    <div class="text-sm text-gray-600">Pay with GoPay</div>
                                </div>
                            </div>
                        </button>
                        
                        <button onclick="payWithEwallet('ovo')" class="w-full p-4 border border-gray-300 rounded-lg text-left hover:border-blue-500 hover:bg-blue-50 transition">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-purple-600 font-bold text-lg">O</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">OVO</div>
                                    <div class="text-sm text-gray-600">Pay with OVO</div>
                                </div>
                            </div>
                        </button>
                        
                        <button onclick="payWithEwallet('dana')" class="w-full p-4 border border-gray-300 rounded-lg text-left hover:border-blue-500 hover:bg-blue-50 transition">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-blue-600 font-bold text-lg">D</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">DANA</div>
                                    <div class="text-sm text-gray-600">Pay with DANA</div>
                                </div>
                            </div>
                        </button>
                        
                        <button onclick="payWithEwallet('linkaja')" class="w-full p-4 border border-gray-300 rounded-lg text-left hover:border-blue-500 hover:bg-blue-50 transition">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                                    <span class="text-red-600 font-bold text-lg">L</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900">LinkAja</div>
                                    <div class="text-sm text-gray-600">Pay with LinkAja</div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24" data-aos="fade-left">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Summary</h2>
                    
                    <!-- Order Info -->
                    <div class="mb-4 pb-4 border-b border-gray-200">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Order ID:</span>
                            <span class="font-semibold">ORD-001</span>
                        </div>
                        <div class="flex justify-between text-sm mt-1">
                            <span class="text-gray-600">Date:</span>
                            <span class="font-semibold">January 20, 2024</span>
                        </div>
                    </div>
                    
                    <!-- Order Items -->
                    <div class="space-y-3 mb-6">
                        @php
                            $orderItems = [
                                ['name' => 'Nike Air Zoom Pegasus 39', 'qty' => 1, 'price' => 1899000, 'image' => 'https://placehold.co/60x60/EBF8FF/3182CE?text=Nike'],
                                ['name' => 'Jersey Basket Pro DryFit', 'qty' => 2, 'price' => 450000, 'image' => 'https://placehold.co/60x60/FFF5EB/DD6B20?text=Jersey'],
                            ];
                        @endphp
                        
                        @foreach($orderItems as $item)
                        <div class="flex items-center space-x-3">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-12 h-12 object-cover rounded">
                            <div class="flex-1">
                                <h3 class="text-sm font-medium text-gray-900">{{ $item['name'] }}</h3>
                                <p class="text-sm text-gray-600">Qty: {{ $item['qty'] }}</p>
                            </div>
                            <span class="text-sm font-semibold text-gray-900">Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}</span>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Order Totals -->
                    <div class="space-y-2 border-t pt-4">
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
                            <span>Total</span>
                            <span>Rp 2.534.100</span>
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
<script>
    let selectedBank = null;

    // Format card number input
    document.getElementById('cardNumber').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
        let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
        e.target.value = formattedValue;
    });

    // Format expiry date input
    document.getElementById('expiryDate').addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length >= 2) {
            value = value.substring(0, 2) + '/' + value.substring(2, 4);
        }
        e.target.value = value;
    });

    // Format CVV input
    document.getElementById('cvv').addEventListener('input', function(e) {
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    });

    // Handle card payment form submission
    document.getElementById('cardPaymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const cardData = {
            number: document.getElementById('cardNumber').value,
            expiry: document.getElementById('expiryDate').value,
            cvv: document.getElementById('cvv').value,
            name: document.getElementById('cardName').value
        };
        
        console.log('Processing card payment:', cardData);
        
        // Show loading state
        const button = e.target.querySelector('button[type="submit"]');
        const originalText = button.textContent;
        button.textContent = 'Processing...';
        button.disabled = true;
        
        // Simulate payment processing
        setTimeout(() => {
            alert('Payment successful! You will receive a confirmation email shortly.');
            window.location.href = '/orders';
        }, 2000);
    });

    function selectBank(bank) {
        selectedBank = bank;
        
        // Update bank option styles
        document.querySelectorAll('.bank-option').forEach(btn => {
            btn.classList.remove('border-blue-500', 'bg-blue-50');
            btn.classList.add('border-gray-300');
        });
        event.target.classList.add('border-blue-500', 'bg-blue-50');
        event.target.classList.remove('border-gray-300');
        
        // Show bank details
        const bankDetails = document.getElementById('bankDetails');
        const accountNumber = document.getElementById('accountNumber');
        
        const bankAccounts = {
            'bca': '1234567890',
            'mandiri': '0987654321',
            'bni': '1122334455',
            'bri': '5544332211'
        };
        
        accountNumber.textContent = bankAccounts[bank];
        bankDetails.classList.remove('hidden');
    }

    function confirmBankTransfer() {
        if (!selectedBank) {
            alert('Please select a bank first');
            return;
        }
        
        console.log('Confirming bank transfer for:', selectedBank);
        
        // Show loading state
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = 'Processing...';
        button.disabled = true;
        
        // Simulate bank transfer confirmation
        setTimeout(() => {
            alert('Bank transfer confirmed! Please complete the transfer and upload the receipt.');
            window.location.href = '/orders';
        }, 2000);
    }

    function payWithEwallet(provider) {
        console.log('Paying with:', provider);
        
        // Show loading state
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = 'Redirecting...';
        button.disabled = true;
        
        // Simulate e-wallet payment
        setTimeout(() => {
            alert(`Redirecting to ${provider.toUpperCase()}... Please complete the payment in the app.`);
            window.location.href = '/orders';
        }, 1500);
    }

    // Initialize Midtrans Snap (if available)
    if (typeof snap !== 'undefined') {
        snap.show();
    }
</script>

<!-- Midtrans Snap Script -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="YOUR_CLIENT_KEY"></script>
@endpush
@endsection
