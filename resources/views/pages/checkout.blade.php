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
                    <span class="ml-2 text-sm font-medium text-gray-500">Payment</span>
                </div>
                <div class="w-16 h-0.5 bg-gray-300"></div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center text-sm font-semibold">3</div>
                    <span class="ml-2 text-sm font-medium text-gray-500">Review</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                
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

                <!-- Payment Method -->
                <div class="bg-white rounded-lg shadow-md p-6" data-aos="fade-right" data-aos-delay="200">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Payment Method</h2>
                    
                    <div class="space-y-3">
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment" value="credit-card" class="h-4 w-4 text-blue-600 focus:ring-blue-500" checked>
                            <div class="ml-3 flex-1">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-blue-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                    </svg>
                                        <div>
                                        <p class="font-medium text-gray-900">Credit/Debit Card</p>
                                        <p class="text-sm text-gray-600">Visa, Mastercard, American Express</p>
                                    </div>
                                </div>
                            </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment" value="bank-transfer" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3 flex-1">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-green-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>
                                    <div>
                                        <p class="font-medium text-gray-900">Bank Transfer</p>
                                        <p class="text-sm text-gray-600">BCA, Mandiri, BNI, BRI</p>
                                    </div>
                                </div>
                                </div>
                        </label>
                        
                        <label class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                            <input type="radio" name="payment" value="ewallet" class="h-4 w-4 text-blue-600 focus:ring-blue-500">
                            <div class="ml-3 flex-1">
                                <div class="flex items-center">
                                    <svg class="w-8 h-8 text-purple-600 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <div>
                                        <p class="font-medium text-gray-900">E-Wallet</p>
                                        <p class="text-sm text-gray-600">GoPay, OVO, DANA, LinkAja</p>
                                </div>
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
                    <div class="space-y-3 mb-6">
                        {{-- TODO: Replace with actual cart items from database --}}
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13l-1.5-7M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"></path>
                            </svg>
                            <p class="text-lg font-medium text-gray-900 mb-2">Keranjang Kosong</p>
                            <p class="text-gray-600">Tambahkan produk ke keranjang untuk melanjutkan checkout</p>
                        </div>
                    </div>
                    
                    <!-- Order Totals -->
                    <div class="space-y-2 border-t pt-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium" id="shipping-cost">Rp 15.000</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Tax</span>
                            <span class="font-medium">Rp 0</span>
                        </div>
                        <div class="flex justify-between text-lg font-semibold border-t pt-2">
                            <span>Total</span>
                            <span id="total-cost">Rp 15.000</span>
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
    // Update shipping cost when shipping method changes
    document.querySelectorAll('input[name="shipping"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const shippingCosts = {
                'standard': 15000,
                'express': 35000,
                'same-day': 50000
            };
            
            const cost = shippingCosts[this.value];
            document.getElementById('shipping-cost').textContent = `Rp ${cost.toLocaleString('id-ID')}`;
            
            // Update total
            const subtotal = 2799000;
            const total = subtotal + cost;
            document.getElementById('total-cost').textContent = `Rp ${total.toLocaleString('id-ID')}`;
        });
    });

    function applyPromoCode() {
        const promoCode = document.getElementById('promoCode').value;
        if (promoCode === 'WELCOME10') {
            // Apply 10% discount
            const subtotal = 2799000;
            const discount = subtotal * 0.1;
            const shipping = parseInt(document.getElementById('shipping-cost').textContent.replace(/[^\d]/g, ''));
            const total = subtotal - discount + shipping;
            
            // Add discount line
            const totalsDiv = document.querySelector('.space-y-2.border-t.pt-4');
            const discountDiv = document.createElement('div');
            discountDiv.className = 'flex justify-between text-sm text-green-600';
            discountDiv.innerHTML = '<span>Discount (WELCOME10)</span><span>-Rp ' + discount.toLocaleString('id-ID') + '</span>';
            
            // Insert before total
            totalsDiv.insertBefore(discountDiv, totalsDiv.lastElementChild);
            
            // Update total
            document.getElementById('total-cost').textContent = `Rp ${total.toLocaleString('id-ID')}`;
            
            alert('Promo code applied! You saved Rp ' + discount.toLocaleString('id-ID'));
                    } else {
            alert('Invalid promo code');
        }
    }

    function placeOrder() {
        // Validate form
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
            alert('Please fill in all required fields');
            return;
        }
        
        // Get selected shipping and payment methods
        const shippingMethod = document.querySelector('input[name="shipping"]:checked').value;
        const paymentMethod = document.querySelector('input[name="payment"]:checked').value;
        
        // Collect form data
        const formData = {
            shipping: {
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
                city: document.getElementById('city').value,
                state: document.getElementById('state').value,
                postalCode: document.getElementById('postalCode').value,
                country: document.getElementById('country').value
            },
            shippingMethod: shippingMethod,
            paymentMethod: paymentMethod,
            items: [
                { name: 'Nike Air Zoom Pegasus 39', qty: 1, price: 1899000 },
                { name: 'Jersey Basket Pro DryFit', qty: 2, price: 450000 }
            ]
        };
        
        console.log('Placing order:', formData);
        
        // Show loading state
        const button = event.target;
        const originalText = button.textContent;
        button.textContent = 'Processing...';
        button.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            alert('Order placed successfully! You will receive a confirmation email shortly.');
            // Redirect to order confirmation page
            window.location.href = '/orders';
        }, 2000);
    }
        </script>
     @endpush
@endsection