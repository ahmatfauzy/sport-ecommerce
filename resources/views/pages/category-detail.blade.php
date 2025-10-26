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
                <li class="text-gray-900 font-medium">{{ $category->name }}</li>
            </ol>
        </nav>

        <!-- Category Header -->
        <div class="mb-8" data-aos="fade-up">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $category->name }}</h1>
            <p class="text-lg text-gray-600">{{ $category->description ?? 'Jelajahi koleksi produk terpilih kami' }}</p>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <span>Menampilkan {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</span>
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
                                <input type="radio" name="price_filter" value="0-500000" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 0 - Rp 500.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="radio" name="price_filter" value="500000-1000000" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 500.000 - Rp 1.000.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="radio" name="price_filter" value="1000000-2000000" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 1.000.000 - Rp 2.000.000</span>
                            </label>
                            <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                <input type="radio" name="price_filter" value="2000000-" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                <span>Rp 2.000.000+</span>
                            </label>
                        </div>
                    </div>

                    <!-- Clear Filters -->
                    <button onclick="clearFilters()" class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium hover:bg-gray-300 transition duration-300 mb-4">
                        Clear All Filters
                    </button>

                    <!-- Apply Filters -->
                    <button onclick="applyFilters()" class="w-full bg-[#3a3a3a] text-white py-2 px-4 rounded-lg font-semibold hover:bg-[#2c2c2c] transition duration-300">
                        Apply Filters
                    </button>
                </div>
            </aside>

            <!-- Products Grid -->
            <main class="lg:col-span-3">
                
                <!-- Sorting Options -->
                <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm" data-aos="fade-left">
                    <span class="text-gray-600 text-sm">Menampilkan {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</span>
                    <div class="flex items-center space-x-4">
                        <span class="text-sm text-gray-600">Urutkan:</span>
                        <select id="sort-select" onchange="applyFilters()" class="px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                            <option value="terbaru">Terbaru</option>
                            <option value="terlaris">Terlaris</option>
                            <option value="termurah">Harga Termurah</option>
                            <option value="termahal">Harga Termahal</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($products as $index => $product)
                        <div class="bg-white shadow-lg rounded-xl overflow-hidden group transition-all duration-300 hover:shadow-xl" 
                             data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <a href="/produk/{{ $product->slug }}" class="block">
                                <img src="{{ $product->image_url }}" 
                                    alt="{{ $product->name }}"
                                    class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-300">
                                <div class="p-4">
                                    <h3 class="font-semibold text-gray-800 truncate group-hover:text-black transition">{{ $product->name }}</h3>
                                    <p class="text-gray-600 text-sm mt-1 truncate">{{ Str::limit($product->description, 60) }}</p>
                                    <span class="block mt-2 text-black font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                </div>
                            </a>
                            {{-- Tombol Tambah ke Keranjang --}}
                            <div class="px-4 pb-4">
                                <button onclick="addToCart({{ $product->id }}, 1)" class="w-full bg-black text-white py-2 px-4 rounded-lg text-sm font-semibold hover:bg-gray-800 transition duration-300 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0">
                                    Tambah ke Keranjang
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <div class="col-span-full text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada produk</h3>
                    <p class="text-gray-600">Produk dalam kategori ini akan muncul di sini</p>
                </div>
                @endif

                <!-- Pagination -->
                @if($products->hasPages())
                <div class="mt-12 flex justify-center" data-aos="fade-up">
                    {{ $products->links() }}
                </div>
                @endif
            </main>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function applyFilters() {
        const url = new URL(window.location);
        const priceFilter = document.querySelector('input[name="price_filter"]:checked');
        const sortSelect = document.getElementById('sort-select');
        
        // Clear existing params
        url.searchParams.delete('price');
        url.searchParams.delete('sort');
        
        if (priceFilter) {
            url.searchParams.set('price', priceFilter.value);
        }
        
        if (sortSelect.value && sortSelect.value !== 'terbaru') {
            url.searchParams.set('sort', sortSelect.value);
        }
        
        window.location.href = url.toString();
    }
    
    function clearFilters() {
        document.querySelectorAll('input[name="price_filter"]').forEach(radio => radio.checked = false);
        document.getElementById('sort-select').value = 'terbaru';
        const url = new URL(window.location);
        url.searchParams.delete('price');
        url.searchParams.delete('sort');
        window.location.href = url.toString();
    }
    
    async function addToCart(productId, quantity) {
        @auth
            try {
                const response = await fetch('/keranjang', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: quantity
                    })
                });
                
                const data = await response.json();
                
                if (response.ok && data.success) {
                    alert('Produk berhasil ditambahkan ke keranjang!');
                    // Update cart count if you have a badge
                } else {
                    alert('Error: ' + (data.message || 'Gagal menambahkan produk ke keranjang'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menambahkan produk ke keranjang');
            }
        @else
            alert('Silakan login terlebih dahulu');
            window.location.href = '/login';
        @endauth
    }
</script>
@endpush
@endsection

