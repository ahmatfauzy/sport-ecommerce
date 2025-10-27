@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="mb-6" data-aos="fade-right">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="/" class="hover:text-gray-900">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/kategori" class="hover:text-gray-900">Kategori</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/kategori/{{ $product->category->slug }}" class="hover:text-gray-900">{{ $product->category->name }}</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-900 font-medium">{{ $product->name }}</li>
            </ol>
        </nav>

        <!-- Product Detail -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8" data-aos="fade-up">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-8">
                
                <!-- Product Images -->
                <div class="space-y-4">
                    <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                        <img id="mainImage" src="{{ $product->image_url }}" 
                             alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    
                    @if(count($product->image_urls) > 1)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($product->image_urls as $index => $image)
                        <button onclick="changeMainImage('{{ $image }}')" 
                                class="aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 {{ $index === 0 ? 'border-blue-500' : 'border-transparent hover:border-gray-300' }}">
                            <img src="{{ $image }}" alt="Image {{ $index + 1 }}" class="w-full h-full object-cover">
                        </button>
                        @endforeach
                    </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <div>
                        <div class="flex items-center space-x-3 mb-2">
                            @if($product->stock > 0)
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-green-500 text-white">Tersedia</span>
                            @else
                            <span class="px-3 py-1 text-sm font-semibold rounded-full bg-red-500 text-white">Stok Habis</span>
                            @endif
                        </div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                        <p class="text-gray-600">{{ $product->description }}</p>
                    </div>

                    <!-- Rating -->
                    <!-- <div class="flex items-center space-x-4">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <span class="text-gray-600">4.5 (128 reviews)</span>
                    </div> -->

                    <!-- Price -->
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <!-- Size Selection -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Size</h3>
                        <div class="grid grid-cols-4 gap-2">
                            @foreach([38, 39, 40, 41, 42, 43, 44, 45] as $size)
                            <button onclick="selectSize({{ $size }})" 
                                    class="size-option p-3 border border-gray-300 rounded-lg text-center hover:border-blue-500 hover:bg-blue-50 transition {{ $size === 42 ? 'border-blue-500 bg-blue-50' : '' }}">
                                {{ $size }}
                            </button>
                            @endforeach
                        </div>
                        <p class="text-sm text-gray-600 mt-2">
                            <a href="#" class="text-blue-600 hover:text-blue-800">Size Guide</a>
                        </p>
                    </div>

                    <!-- Quantity -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Quantity</h3>
                        <div class="flex items-center space-x-3">
                            <button onclick="decreaseQuantity()" class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" /></svg>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" max="10" class="w-16 text-center border border-gray-300 rounded-lg py-2">
                            <button onclick="increaseQuantity()" class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button onclick="addToCart()" class="w-full bg-[#3a3a3a] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#2c2c2c] transition">Add to Cart</button>
                        <button onclick="buyNow()" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">Buy Now</button>
                        <div class="flex space-x-3">
                            <button class="flex-1 border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-50 transition">
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" /></svg>
                                Add to Wishlist
                            </button>
                            <button class="flex-1 border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-50 transition">
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.935-2.186 2.25 2.25 0 00-3.935 2.186z" /></svg>
                                Share
                            </button>
                        </div>
                    </div>

                    <!-- Product Features -->
                    @if($product->features && count((array)$product->features) > 0)
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Key Features</h3>
                        <ul class="space-y-2 text-gray-600">
                            @foreach($product->features as $feature)
                            <li class="flex items-center">baju

                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4.5 12.75l6 6 9-13.5" /></svg>
                                {{ is_array($feature) ? implode(' - ', $feature) : $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8" data-aos="fade-up" data-aos-delay="200">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6">
                    <button onclick="switchTab('specifications')" class="tab-button py-4 px-1 border-b-2 border-blue-500 text-blue-600 font-medium">Specifications</button>
                    <button onclick="switchTab('shipping')" class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700">Shipping & Returns</button>
                </nav>
            </div>
            
            <div class="p-6">
                <div id="specifications-tab" class="tab-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Product Specifications</h3>
                    @if($product->specification && is_array($product->specification) && count($product->specification) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($product->specification as $key => $value)
                        <div class="flex justify-between border-b pb-2">
                            <dt class="text-gray-600">{{ $key }}:</dt>
                            <dd class="font-medium">{{ $value }}</dd>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-gray-500">Spesifikasi belum tersedia</p>
                    @endif
                </div>

                <div id="shipping-tab" class="tab-content hidden">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Shipping & Returns</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Shipping Information</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li>• Free shipping on orders over Rp 500.000</li>
                                <li>• Standard delivery: 3-5 business days</li>
                                <li>• Express delivery: 1-2 business days</li>
                                <li>• Same-day delivery available in Jakarta</li>
                                <li>• International shipping available</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Return Policy</h4>
                            <ul class="space-y-2 text-gray-600">
                                <li>• 30-day return policy</li>
                                <li>• Items must be in original condition</li>
                                <li>• Free return shipping</li>
                                <li>• Refund processed within 5-7 days</li>
                                <li>• Exchange available for different sizes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="bg-white rounded-lg shadow-lg p-6" data-aos="fade-up" data-aos-delay="300">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Produk Terkait</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                <a href="/produk/{{ $relatedProduct->slug }}" class="group cursor-pointer">
                    <img src="{{ $relatedProduct->images[0] ?? 'https://via.placeholder.com/300x300' }}" 
                         alt="{{ $relatedProduct->name }}" 
                         class="w-full h-48 object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                    <h3 class="font-semibold text-gray-900 mt-2 group-hover:text-blue-600">{{ $relatedProduct->name }}</h3>
                    <p class="text-lg font-bold text-gray-900">Rp {{ number_format($relatedProduct->price, 0, ',', '.') }}</p>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    let selectedSize = 42;
    let selectedColor = 'Black/White';

    function changeMainImage(imageUrl) {
        document.getElementById('mainImage').src = imageUrl;
        document.querySelectorAll('.aspect-square button').forEach(btn => {
            btn.classList.remove('border-blue-500');
            btn.classList.add('border-transparent');
        });
        event.target.closest('button').classList.add('border-blue-500');
        event.target.closest('button').classList.remove('border-transparent');
    }

    function selectSize(size) {
        selectedSize = size;
        document.querySelectorAll('.size-option').forEach(btn => {
            btn.classList.remove('border-blue-500', 'bg-blue-50');
            btn.classList.add('border-gray-300');
        });
        event.target.classList.add('border-blue-500', 'bg-blue-50');
        event.target.classList.remove('border-gray-300');
    }

    function selectColor(color) {
        selectedColor = color;
        document.getElementById('selectedColor').textContent = color;
        document.querySelectorAll('.color-option').forEach(btn => {
            btn.classList.remove('border-blue-500');
            btn.classList.add('border-gray-300');
        });
        event.target.classList.add('border-blue-500');
        event.target.classList.remove('border-gray-300');
    }

    function increaseQuantity() {
        const qty = document.getElementById('quantity');
        if (parseInt(qty.value) < 10) qty.value = parseInt(qty.value) + 1;
    }

    function decreaseQuantity() {
        const qty = document.getElementById('quantity');
        if (parseInt(qty.value) > 1) qty.value = parseInt(qty.value) - 1;
    }

    async function addToCart() {
        @auth
            const res = await fetch('/keranjang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: {{ $product->id }},
                    quantity: parseInt(document.getElementById('quantity').value)
                })
            });
            const data = await res.json();
            if (res.ok && data.success) {
                alert('Produk berhasil ditambahkan ke keranjang!');
            } else {
                alert('Error: ' + (data.message || 'Gagal menambahkan produk ke keranjang'));
            }
        @else
            alert('Silakan login terlebih dahulu');
            window.location.href = '/login';
        @endauth
    }

    async function buyNow() {
        @auth
            const res = await fetch('/keranjang', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    product_id: {{ $product->id }},
                    quantity: parseInt(document.getElementById('quantity').value)
                })
            });
            const data = await res.json();
            if (res.ok && data.success) {
                window.location.href = '/checkout';
            } else {
                alert('Error: ' + (data.message || 'Gagal menambahkan produk'));
            }
        @else
            alert('Silakan login terlebih dahulu');
            window.location.href = '/login';
        @endauth
    }

    function switchTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(t => t.classList.add('hidden'));
        document.querySelectorAll('.tab-button').forEach(b => {
            b.classList.remove('border-blue-500', 'text-blue-600');
            b.classList.add('border-transparent', 'text-gray-500');
        });
        document.getElementById(tabName + '-tab').classList.remove('hidden');
        event.target.classList.add('border-blue-500', 'text-blue-600');
        event.target.classList.remove('border-transparent', 'text-gray-500');
    }
</script>
@endpush
@endsection