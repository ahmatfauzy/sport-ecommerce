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
                    <!-- Main Image -->
                    <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                        <img id="mainImage" src="{{ $product->images[0] ?? 'https://via.placeholder.com/600x600' }}" 
                             alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Thumbnail Images -->
                    @if(count($product->images) > 1)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($product->images as $index => $image)
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
                    <!-- Product Title & Badge -->
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
                    <div class="flex items-center space-x-4">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= 4)
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @else
                                    <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.364c.518 0 .734.654.372 1.01l-4.36 3.172a.563.563 0 00-.222.63l1.616 4.99a.563.563 0 01-.814.62l-4.36-3.171a.563.563 0 00-.654 0l-4.36 3.17a.563.563 0 01-.814-.62l1.616-4.99a.563.563 0 00-.222-.63L2.48 9.92c-.362-.356-.146-1.01.372-1.01h5.364a.563.563 0 00.475-.31l2.125-5.111z" />
                                    </svg>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600">4.5 (128 reviews)</span>
                    </div>

                    <!-- Price -->
                    <div class="flex items-center space-x-4">
                        <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>

                    <!-- Size Selection -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Size</h3>
                        <div class="grid grid-cols-4 gap-2">
                            @php
                                $sizes = [38, 39, 40, 41, 42, 43, 44, 45];
                            @endphp
                            @foreach($sizes as $size)
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

                    <!-- Color Selection -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Color</h3>
                        <div class="flex space-x-3">
                            @php
                                $colors = [
                                    ['name' => 'Black/White', 'code' => 'bg-gradient-to-r from-black to-white'],
                                    ['name' => 'Blue/White', 'code' => 'bg-gradient-to-r from-blue-500 to-white'],
                                    ['name' => 'Red/White', 'code' => 'bg-gradient-to-r from-red-500 to-white'],
                                ];
                            @endphp
                            @foreach($colors as $index => $color)
                            <button onclick="selectColor('{{ $color['name'] }}')" 
                                    class="color-option w-12 h-12 rounded-full border-2 {{ $index === 0 ? 'border-blue-500' : 'border-gray-300' }} hover:border-blue-500 transition {{ $color['code'] }}"></button>
                            @endforeach
                        </div>
                        <p class="text-sm text-gray-600 mt-2">Selected: <span id="selectedColor">Black/White</span></p>
                    </div>

                    <!-- Quantity -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Quantity</h3>
                        <div class="flex items-center space-x-3">
                            <button onclick="decreaseQuantity()" class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                </svg>
                            </button>
                            <input type="number" id="quantity" value="1" min="1" max="10" class="w-16 text-center border border-gray-300 rounded-lg py-2">
                            <button onclick="increaseQuantity()" class="w-10 h-10 border border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-3">
                        <button onclick="addToCart()" class="w-full bg-[#3a3a3a] text-white py-3 px-6 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300">
                            Add to Cart
                        </button>
                        <button onclick="buyNow()" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            Buy Now
                        </button>
                        <div class="flex space-x-3">
                            <button class="flex-1 border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                                <svg class="w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Add to Wishlist
                            </button>
                            <button class="flex-1 border border-gray-300 text-gray-700 py-3 px-6 rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                                <svg class="w-5 h-5 inline-block mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.935-2.186 2.25 2.25 0 00-3.935 2.186z" />
                                </svg>
                                Share
                            </button>
                        </div>
                    </div>

                    <!-- Product Features -->
                    <div class="border-t pt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Key Features</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                Responsive Air Zoom cushioning
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                Lightweight mesh upper
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                Durable rubber outsole
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                Breathable design
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Details Tabs -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-8" data-aos="fade-up" data-aos-delay="200">
            <div class="border-b border-gray-200">
                <nav class="flex space-x-8 px-6">
                    <button onclick="switchTab('description')" class="tab-button py-4 px-1 border-b-2 border-blue-500 text-blue-600 font-medium">
                        Description
                    </button>
                    <button onclick="switchTab('specifications')" class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                        Specifications
                    </button>
                    <button onclick="switchTab('reviews')" class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                        Reviews (128)
                    </button>
                    <button onclick="switchTab('shipping')" class="tab-button py-4 px-1 border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                        Shipping & Returns
                    </button>
                </nav>
            </div>
            
            <div class="p-6">
                <!-- Description Tab -->
                <div id="description-tab" class="tab-content">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Product Description</h3>
                    <div class="prose max-w-none text-gray-600">
                        <p class="mb-4">
                            The Nike Air Zoom Pegasus 39 is designed for runners who want responsive cushioning and a smooth ride. 
                            This latest version features updated Air Zoom cushioning that provides more responsiveness underfoot, 
                            making every step feel energized.
                        </p>
                        <p class="mb-4">
                            The lightweight mesh upper offers breathability and comfort, while the durable rubber outsole 
                            provides excellent traction on various surfaces. Whether you're training for a marathon or 
                            going for a casual jog, the Pegasus 39 delivers the performance you need.
                        </p>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Perfect For:</h4>
                        <ul class="list-disc list-inside mb-4">
                            <li>Daily training runs</li>
                            <li>Long distance running</li>
                            <li>Road running</li>
                            <li>Beginner to intermediate runners</li>
                        </ul>
                    </div>
                </div>

                <!-- Specifications Tab -->
                <div id="specifications-tab" class="tab-content hidden">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Product Specifications</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">General</h4>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Brand:</dt>
                                    <dd class="font-medium">Nike</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Model:</dt>
                                    <dd class="font-medium">Air Zoom Pegasus 39</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Gender:</dt>
                                    <dd class="font-medium">Unisex</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Weight:</dt>
                                    <dd class="font-medium">280g (Size 42)</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900 mb-3">Technical</h4>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Upper:</dt>
                                    <dd class="font-medium">Mesh</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Midsole:</dt>
                                    <dd class="font-medium">Air Zoom</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Outsole:</dt>
                                    <dd class="font-medium">Rubber</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-600">Drop:</dt>
                                    <dd class="font-medium">10mm</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>

                <!-- Reviews Tab -->
                <div id="reviews-tab" class="tab-content hidden">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Customer Reviews</h3>
                    
                    <!-- Review Summary -->
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="text-center">
                                <div class="text-3xl font-bold text-gray-900">4.5</div>
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= 4)
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.364c.518 0 .734.654.372 1.01l-4.36 3.172a.563.563 0 00-.222.63l1.616 4.99a.563.563 0 01-.814.62l-4.36-3.171a.563.563 0 00-.654 0l-4.36 3.17a.563.563 0 01-.814-.62l1.616-4.99a.563.563 0 00-.222-.63L2.48 9.92c-.362-.356-.146-1.01.372-1.01h5.364a.563.563 0 00.475-.31l2.125-5.111z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <div class="text-sm text-gray-600">Based on 128 reviews</div>
                            </div>
                            <div class="flex-1">
                                <div class="space-y-1">
                                    @php
                                        $ratingDistribution = [
                                            ['stars' => 5, 'count' => 85, 'percentage' => 66],
                                            ['stars' => 4, 'count' => 28, 'percentage' => 22],
                                            ['stars' => 3, 'count' => 10, 'percentage' => 8],
                                            ['stars' => 2, 'count' => 3, 'percentage' => 2],
                                            ['stars' => 1, 'count' => 2, 'percentage' => 2],
                                        ];
                                    @endphp
                                    @foreach($ratingDistribution as $rating)
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm w-8">{{ $rating['stars'] }}★</span>
                                        <div class="flex-1 bg-gray-200 rounded-full h-2">
                                            <div class="bg-yellow-400 h-2 rounded-full" style="width: {{ $rating['percentage'] }}%"></div>
                                        </div>
                                        <span class="text-sm text-gray-600 w-8">{{ $rating['count'] }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Individual Reviews -->
                    <div class="space-y-6">
                        @php
                            $reviews = [
                                [
                                    'name' => 'Budi Santoso',
                                    'rating' => 5,
                                    'date' => '2024-01-15',
                                    'comment' => 'Sepatu yang sangat nyaman untuk lari harian. Cushioning-nya responsif dan tidak membuat kaki lelah meski lari jauh.',
                                    'verified' => true
                                ],
                                [
                                    'name' => 'Citra Lestari',
                                    'rating' => 4,
                                    'date' => '2024-01-12',
                                    'comment' => 'Kualitas bagus dan tahan lama. Hanya saja agak sempit di bagian depan untuk kaki yang lebar.',
                                    'verified' => true
                                ],
                                [
                                    'name' => 'Ahmad Yusuf',
                                    'rating' => 5,
                                    'date' => '2024-01-10',
                                    'comment' => 'Worth it banget! Sudah pakai 3 bulan dan masih seperti baru. Cocok untuk berbagai jenis lari.',
                                    'verified' => false
                                ],
                            ];
                        @endphp
                        
                        @foreach($reviews as $review)
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-gray-600">{{ substr($review['name'], 0, 1) }}</span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <h4 class="font-semibold text-gray-900">{{ $review['name'] }}</h4>
                                        @if($review['verified'])
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Verified Purchase</span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-2 mb-2">
                                        <div class="flex text-yellow-400">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review['rating'])
                                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                                    </svg>
                                                @else
                                                    <svg class="w-4 h-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.364c.518 0 .734.654.372 1.01l-4.36 3.172a.563.563 0 00-.222.63l1.616 4.99a.563.563 0 01-.814.62l-4.36-3.171a.563.563 0 00-.654 0l-4.36 3.17a.563.563 0 01-.814-.62l1.616-4.99a.563.563 0 00-.222-.63L2.48 9.92c-.362-.356-.146-1.01.372-1.01h5.364a.563.563 0 00.475-.31l2.125-5.111z" />
                                                    </svg>
                                                @endif
                                            @endfor
                                        </div>
                                        <span class="text-sm text-gray-500">{{ $review['date'] }}</span>
                                    </div>
                                    <p class="text-gray-700">{{ $review['comment'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Write Review Button -->
                    <div class="mt-6">
                        <button class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Write a Review
                        </button>
                    </div>
                </div>

                <!-- Shipping Tab -->
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
        
        // Update thumbnail borders
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
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        if (currentValue < 10) {
            quantityInput.value = currentValue + 1;
        }
    }

    function decreaseQuantity() {
        const quantityInput = document.getElementById('quantity');
        const currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }

    function addToCart() {
        const quantity = document.getElementById('quantity').value;
        console.log('Add to cart:', {
            product: '{{ $product->name }}',
            productId: {{ $product->id }},
            size: selectedSize,
            color: selectedColor,
            quantity: quantity
        });
        // Implement add to cart functionality
    }

    function buyNow() {
        const quantity = document.getElementById('quantity').value;
        console.log('Buy now:', {
            product: '{{ $product->name }}',
            productId: {{ $product->id }},
            size: selectedSize,
            color: selectedColor,
            quantity: quantity
        });
        // Implement buy now functionality
    }

    function switchTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.add('hidden');
        });
        
        // Remove active class from all tab buttons
        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('border-blue-500', 'text-blue-600');
            btn.classList.add('border-transparent', 'text-gray-500');
        });
        
        // Show selected tab content
        document.getElementById(tabName + '-tab').classList.remove('hidden');
        
        // Add active class to selected tab button
        event.target.classList.add('border-blue-500', 'text-blue-600');
        event.target.classList.remove('border-transparent', 'text-gray-500');
    }
</script>
@endpush
@endsection
