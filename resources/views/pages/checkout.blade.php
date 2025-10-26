@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <header class="mb-8" data-aos="fade-down">
            <h1 class="text-4xl font-bold text-gray-800">Checkout</h1>
            <p class="mt-2 text-lg text-gray-600">Complete your order</p>
        </header>

        <!-- Checkout Steps -->
        <div class="mb-8" data-aos="fade-up">
            <div class="flex items-center justify-center space-x-8">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center text-sm font-semibold">1</div>
                    <span class="ml-2 text-sm font-medium text-blue-600">Shipping</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center text-sm font-semibold">2</div>
                    <span class="ml-2 text-sm font-medium text-gray-500">Review</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Shipping Information -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-right">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Shipping Information</h2>
                    
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                <input type="text" id="firstName" name="firstName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                <input type="text" id="lastName" name="lastName" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea id="address" name="address" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                <input type="text" id="city" name="city" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-700 mb-1">State/Province</label>
                                <input type="text" id="state" name="state" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                            <div>
                                <label for="postalCode" class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                                <input type="text" id="postalCode" name="postalCode" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                            <select id="country" name="country" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">Select Country</option>
                                <option value="ID">Indonesia</option>
                                <option value="MY">Malaysia</option>
                                <option value="SG">Singapore</option>
                                <option value="TH">Thailand</option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Shipping Method -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-right" data-aos-delay="100">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Shipping Method</h2>
                    
                    <div class="space-y-3">
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="shipping" value="standard" class="h-4 w-4 text-blue-600 focus:ring-blue-500" checked>
                            <div class="ml-3 flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium text-gray-900">Standard Delivery</p>
                                        <p class="text-sm text-gray-600">3-5 business days</p>
                                    </div>
                                    <span class="font-semibold text-gray-900">Rp 15.000</span>
                                </div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="shipping" value="express" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3 flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium text-gray-900">Express Delivery</p>
                                        <p class="text-sm text-gray-600">1-2 business days</p>
                                    </div>
                                    <span class="font-semibold text-gray-900">Rp 35.000</span>
                                </div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="shipping" value="same-day" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3 flex-1">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium text-gray-900">Same Day Delivery</p>
                                        <p class="text-sm text-gray-600">Available in Jakarta only</p>
                                    </div>
                                    <span class="font-semibold text-gray-900">Rp 50.000</span>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24" data-aos="fade-left">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Order Summary</h2>
                    
                    <!-- Order Items -->
                    <div class="space-y-3 mb-6 max-h-96 overflow-y-auto">
                        @foreach($cartItems as $item)
                        <div class="flex items-center space-x-3">
                            <img src="{{ $item->product->image_url }}" 
                                 alt="{{ $item->product->name }}" 
                                 class="w-16 h-16 object-cover rounded">
                            <div class="flex-1">
                                <h4 class="font-medium text-sm text-gray-900">{{ $item->product->name }}</h4>
                                <p class="text-xs text-gray-600">Qty: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-sm">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Order Totals -->
                    <div class="space-y-2 border-t pt-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium" id="subtotal-display">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium" id="shipping-cost">Rp {{ number_format($shipping, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-lg font-semibold border-t pt-2">
                            <span>Total</span>
                            <span id="total-cost">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Promo Code -->
                    <div class="mt-6">
                        <label for="promoCode" class="block text-sm font-medium text-gray-700 mb-2">Promo Code</label>
                        <div class="flex space-x-2">
                            <input type="text" id="promoCode" placeholder="Enter promo code" class="flex-1 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <button onclick="applyPromoCode()" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                                Apply
                            </button>
                        </div>
                    </div>
                    
                    <!-- Place Order Button -->
                    <button onclick="placeOrder()" class="w-full mt-6 bg-[#3a3a3a] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300">
                        Place Order
                    </button>
                    
                    <!-- Security Notice -->
                    <div class="mt-4 text-center">
                        <p class="text-xs text-gray-500">
                            <svg class="w-4 h-4 inline-block mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m5.25-3.75a3 3 0 00-3-3H6a3 3 0 00-3 3v1.5c0 .621.504 1.125 1.125 1.125h15.75c.621 0 1.125-.504 1.125-1.125V6z" />
                            </svg>
                            Secure checkout with SSL encryption
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
// Update shipping cost dynamically
document.querySelectorAll('input[name="shipping"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const shippingCosts = {
            'standard': 15000,
            'express': 35000,
            'same-day': 50000
        };
        
        const cost = shippingCosts[this.value];
        document.getElementById('shipping-cost').textContent = `Rp ${cost.toLocaleString('id-ID')}`;
        
        const subtotal = {{ $subtotal }};
        const total = subtotal + cost;
        document.getElementById('total-cost').textContent = `Rp ${total.toLocaleString('id-ID')}`;
    });
});

function applyPromoCode() {
    const promoCode = document.getElementById('promoCode').value;
    if (promoCode === 'WELCOME10') {
        const subtotal = {{ $subtotal }};
        const discount = subtotal * 0.1;
        const shipping = parseInt(document.getElementById('shipping-cost').textContent.replace(/[^\d]/g, ''));
        const total = subtotal - discount + shipping;
        
        const totalsDiv = document.querySelector('.space-y-2.border-t.pt-4');
        const discountDiv = document.createElement('div');
        discountDiv.className = 'flex justify-between text-sm text-green-600';
        discountDiv.innerHTML = '<span>Discount (WELCOME10)</span><span>-Rp ' + discount.toLocaleString('id-ID') + '</span>';
        totalsDiv.insertBefore(discountDiv, totalsDiv.lastElementChild);
        
        document.getElementById('total-cost').textContent = `Rp ${total.toLocaleString('id-ID')}`;
        alert('Promo code applied! You saved Rp ' + discount.toLocaleString('id-ID'));
    } else {
        alert('Invalid promo code');
    }
}

async function placeOrder() {
    const requiredFields = ['firstName', 'lastName', 'email', 'phone', 'address', 'city', 'state', 'postalCode', 'country'];
    let isValid = true;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('border-red-500');
        } else {
            input.classList.remove('border-red-500');
        }
    });
    
    if (!isValid) {
        alert('Mohon lengkapi semua field yang wajib diisi');
        return;
    }
    
    const shippingMethod = document.querySelector('input[name="shipping"]:checked').value;
    const paymentMethod = 'manual'; // default since Payment Method is removed
    
    const formData = {
        shipping_name: document.getElementById('firstName').value + ' ' + document.getElementById('lastName').value,
        shipping_email: document.getElementById('email').value,
        shipping_phone: document.getElementById('phone').value,
        shipping_address: document.getElementById('address').value,
        shipping_city: document.getElementById('city').value,
        shipping_state: document.getElementById('state').value,
        shipping_postal_code: document.getElementById('postalCode').value,
        shipping_country: document.getElementById('country').value,
        shipping_method: shippingMethod,
        payment_method: paymentMethod
    };
    
    const button = event.target;
    const originalText = button.textContent;
    button.textContent = 'Processing...';
    button.disabled = true;
    
    try {
        const response = await fetch('/checkout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(formData)
        });
        
        const data = await response.json();
        
        if (response.ok && data.success) {
            window.location.href = data.redirect;
        } else {
            alert(data.message || 'Gagal membuat pesanan');
            button.textContent = originalText;
            button.disabled = false;
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Terjadi kesalahan saat membuat pesanan');
        button.textContent = originalText;
        button.disabled = false;
    }
}
</script>
@endpush
@endsection
