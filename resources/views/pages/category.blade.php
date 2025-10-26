@extends('layouts.app')

@section('content')
<div class="bg-gray-100 pt-24 pb-16 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <nav class="mb-6" data-aos="fade-right">
            <ol class="flex items-center space-x-2 text-sm text-gray-600">
                <li><a href="/" class="hover:text-gray-900">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li><a href="/categories" class="hover:text-gray-900">Categories</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-gray-900 font-medium">Sepatu Lari</li>
            </ol>
        </nav>

        <!-- Category Header -->
        <div class="mb-8" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Sepatu Lari</h1>
            <p class="text-lg text-gray-600">Temukan sepatu lari terbaik untuk performa maksimal Anda</p>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <span>Menampilkan 15 produk</span>
            </div>
        </div>

        <!-- Layout: Filter Sidebar + Products Grid -->
        <div class="lg:grid lg:grid-cols-4 lg:gap-8">
            
            <!-- Filter Sidebar -->
            <aside class="lg:col-span-1 mb-8 lg:mb-0" data-aos="fade-right">
                <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                    <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Filter Produk</h2>

                    <!-- Price Range -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Harga</h3>
                        <div class="space-y-2">
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 0 - Rp 500.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 500.000 - Rp 1.000.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 1.000.000 - Rp 2.000.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 2.000.000+</span>
                            </label>
                        </div>
                    </div>

                    <!-- Brand -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Merk</h3>
                        <div class="space-y-2">
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                Nike
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                Adidas
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                Puma
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                New Balance
                            </label>
                        </div>
                    </div>

                    <!-- Size -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Ukuran</h3>
                        <div class="grid grid-cols-3 gap-2">
                            @php
                                $sizes = [38, 39, 40, 41, 42, 43, 44, 45, 46];
                            @endphp
                            @foreach($sizes as $size)
                            <label class="flex items-center justify-center text-gray-600 hover:text-gray-800 cursor-pointer border border-gray-300 rounded p-2 text-sm">
                                <input type="checkbox" class="sr-only">
                                {{ $size }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Color -->
                    <div class="mb-6">
                        <h3 class="text-lg font-medium text-gray-700 mb-3">Warna</h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $colors = [
                                    ['name' => 'Hitam', 'code' => 'bg-black'],
                                    ['name' => 'Putih', 'code' => 'bg-white border border-gray-300'],
                                    ['name' => 'Merah', 'code' => 'bg-red-500'],
                                    ['name' => 'Biru', 'code' => 'bg-blue-500'],
                                    ['name' => 'Hijau', 'code' => 'bg-green-500'],
                                    ['name' => 'Kuning', 'code' => 'bg-yellow-500'],
                                ];
                            @endphp
                            @foreach($colors as $color)
                            <label class="flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only">
                                <div class="w-6 h-6 rounded-full {{ $color['code'] }} border-2 border-gray-300 hover:border-gray-500"></div>
                                <span class="ml-2 text-sm text-gray-600">{{ $color['name'] }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    <button class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition duration-300 mb-4">
                        Clear All Filters
                    </button>

                    <!-- Apply Filters -->
                    <button class="w-full bg-[#3a3a3a] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300">
                        Apply Filters
                    </button>
                </div>
            </aside>

            <!-- Products Grid -->
            <main class="lg:col-span-3">
                
                <!-- Sorting Options -->
                <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm" data-aos="fade-left">
                    <span class="text-gray-600 text-sm">Menampilkan 1-12 dari 15 produk</span>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Urutkan:</span>
                        <select class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <option value="terbaru">Terbaru</option>
                            <option value="terlaris">Terlaris</option>
                            <option value="termurah">Harga Termurah</option>
                            <option value="termahal">Harga Termahal</option>
                            <option value="rating">Rating Tertinggi</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $products = [
                            [
                                'name' => 'Nike Air Zoom Pegasus 39',
                                'price' => 1899000,
                                'original_price' => 2199000,
                                'image' => 'https://placehold.co/400x300/EBF8FF/3182CE?text=Nike+Pegasus',
                                'rating' => 4.5,
                                'reviews' => 128,
                                'discount' => 14,
                                'badge' => 'Best Seller'
                            ],
                            [
                                'name' => 'Adidas Ultraboost Light',
                                'price' => 2500000,
                                'original_price' => null,
                                'image' => 'https://placehold.co/400x300/E6FFFA/38B2AC?text=Adidas+Ultraboost',
                                'rating' => 4.8,
                                'reviews' => 95,
                                'discount' => null,
                                'badge' => 'New'
                            ],
                            [
                                'name' => 'Puma Deviate Nitro 2',
                                'price' => 1950000,
                                'original_price' => 2250000,
                                'image' => 'https://placehold.co/400x300/FFF5EB/DD6B20?text=Puma+Nitro',
                                'rating' => 4.3,
                                'reviews' => 67,
                                'discount' => 13,
                                'badge' => null
                            ],
                            [
                                'name' => 'New Balance Fresh Foam 1080v12',
                                'price' => 2200000,
                                'original_price' => null,
                                'image' => 'https://placehold.co/400x300/F0FFF4/38A169?text=NB+Fresh+Foam',
                                'rating' => 4.6,
                                'reviews' => 89,
                                'discount' => null,
                                'badge' => null
                            ],
                            [
                                'name' => 'Asics Gel-Kayano 29',
                                'price' => 2100000,
                                'original_price' => 2400000,
                                'image' => 'https://placehold.co/400x300/FAF5FF/805AD5?text=Asics+Kayano',
                                'rating' => 4.4,
                                'reviews' => 76,
                                'discount' => 13,
                                'badge' => null
                            ],
                            [
                                'name' => 'Brooks Ghost 15',
                                'price' => 1800000,
                                'original_price' => null,
                                'image' => 'https://placehold.co/400x300/F7FAFC/718096?text=Brooks+Ghost',
                                'rating' => 4.7,
                                'reviews' => 112,
                                'discount' => null,
                                'badge' => 'Popular'
                            ],
                        ];
                    @endphp

                    @foreach($products as $index => $product)
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden group transition-all duration-300 hover:shadow-xl" 
                         data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        
                        <!-- Product Image -->
                        <div class="relative">
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" 
                                 class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                            
                            <!-- Badge -->
                            @if($product['badge'])
                            <div class="absolute top-2 left-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $product['badge'] === 'Best Seller' ? 'bg-red-500 text-white' : ($product['badge'] === 'New' ? 'bg-green-500 text-white' : 'bg-blue-500 text-white') }}">
                                    {{ $product['badge'] }}
                                </span>
                            </div>
                            @endif
                            
                            <!-- Discount -->
                            @if($product['discount'])
                            <div class="absolute top-2 right-2">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-orange-500 text-white">
                                    -{{ $product['discount'] }}%
                                </span>
                            </div>
                            @endif
                            
                            <!-- Quick Actions -->
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center opacity-0 group-hover:opacity-100">
                                <div class="flex space-x-2">
                                    <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                    </button>
                                    <button class="bg-white text-gray-800 p-2 rounded-full hover:bg-gray-100 transition">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition">{{ $product['name'] }}</h3>
                            
                            <!-- Rating -->
                            <div class="flex items-center mb-2">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= floor($product['rating']))
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
                                <span class="ml-2 text-sm text-gray-600">({{ $product['reviews'] }})</span>
                            </div>
                            
                            <!-- Price -->
                            <div class="flex items-center space-x-2 mb-3">
                                <span class="text-lg font-bold text-gray-900">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                                @if($product['original_price'])
                                <span class="text-sm text-gray-500 line-through">Rp {{ number_format($product['original_price'], 0, ',', '.') }}</span>
                                @endif
                            </div>
                            
                            <!-- Add to Cart Button -->
                            <button class="w-full bg-[#3a3a3a] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12 flex justify-center" data-aos="fade-up">
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
            </main>
        </div>
    </div>
</div>
@endsection
