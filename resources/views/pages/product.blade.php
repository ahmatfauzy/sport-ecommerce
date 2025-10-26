@extends('layouts.app')

@section('content')
    {{-- Container utama halaman produk --}}
    <div class="bg-gray-100 pt-24 pb-16"> {{-- Padding top untuk memberi ruang di bawah navbar fixed --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Judul Halaman --}}
            <header class="mb-8 text-center" data-aos="fade-up">
                <h1 class="text-4xl font-bold text-black">Koleksi Produk Kami</h1>
                <p class="mt-2 text-lg text-gray-600">Temukan koleksi tas wanita terbaru dengan desain elegan dan kualitas terbaik.</p>
            </header>

            {{-- Layout Utama: Filter Sidebar + Grid Produk --}}
            <div class="lg:grid lg:grid-cols-4 lg:gap-8">

                {{-- Sidebar Filter (Kolom 1) --}}
                <aside class="lg:col-span-1 mb-8 lg:mb-0" data-aos="fade-right">
                    <div class="bg-white p-6 rounded-lg shadow-md sticky top-24"> {{-- Sticky top agar filter tetap terlihat --}}
                        <h2 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">Filter Produk</h2>

                        {{-- Filter Harga --}}
                        <div class="mb-6">
                            <h3 class="text-lg font-medium text-gray-700 mb-3">Rentang Harga</h3>
                            <div class="space-y-2">
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="radio" name="price_range" value="0-100000" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    < 100.000
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="radio" name="price_range" value="100000-500000" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    100.000 - 500.000
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="radio" name="price_range" value="500000-1000000" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    500.000 - 1.000.000
                                </label>
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="radio" name="price_range" value="1000000-" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2">
                                    > 1.000.000
                                </label>
                            </div>
                        </div>

                        {{-- Filter Kategori --}}
                        <div>
                            <h3 class="text-lg font-medium text-gray-700 mb-3">Kategori</h3>
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                                    <input type="checkbox" class="h-4 w-4 rounded border-gray-300 text-black focus:ring-black mr-2" 
                                           value="{{ $category->slug }}" name="category[]">
                                    {{ $category->name }}
                                </label>
                                @endforeach
                            </div>
                        </div>

                         {{-- Tombol Filter --}}
                         <div class="mt-8 space-y-2">
                            <button id="apply-filters" class="w-full bg-black text-white py-2 px-4 rounded-lg font-semibold hover:bg-gray-800 transition duration-300">
                                Terapkan Filter
                            </button>
                            <button id="clear-filters" class="w-full bg-gray-300 text-gray-700 py-2 px-4 rounded-lg font-semibold hover:bg-gray-400 transition duration-300">
                                Reset Filter
                            </button>
                        </div>
                    </div>
                </aside>

                {{-- Konten Utama: Sorting + Grid Produk (Kolom 2-4) --}}
                <main class="lg:col-span-3">

                    {{-- Opsi Sorting --}}
                    <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-sm" data-aos="fade-left">
                         <span class="text-gray-600 text-sm">Menampilkan {{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</span>
                         <div class="relative">
                            <label for="sort-options" class="sr-only">Urutkan berdasarkan</label>
                            <select id="sort-options" name="sort-options" class="block appearance-none w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-gray-500 focus:ring-0 text-sm">
                                <option value="terbaru">Terbaru</option>
                                <option value="terlaris">Terlaris</option>
                                <option value="termurah">Harga Termurah</option>
                                <option value="termahal">Harga Termahal</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                            </div>
                        </div>
                    </div>

                    {{-- Grid Produk --}}
                    @if($products->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($products as $index => $product)
                            <div class="bg-white shadow-lg rounded-xl overflow-hidden group transition-all duration-300 hover:shadow-xl" 
                                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                                <a href="/produk/{{ $product->slug }}" class="block">
                                    <img src="{{ $product->images[0] ?? 'https://via.placeholder.com/400x300' }}" 
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
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">Belum ada produk tersedia</p>
                    </div>
                    @endif

                    {{-- Pagination --}}
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
                    } else {
                        alert('Error: ' + (data.message || 'Gagal menambahkan produk ke keranjang'));
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menambahkan produk ke keranjang');
                }
            @else
                alert('Silakan login terlebih dahulu untuk menambahkan produk ke keranjang');
                window.location.href = '/login';
            @endauth
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const applyFiltersBtn = document.getElementById('apply-filters');
            const clearFiltersBtn = document.getElementById('clear-filters');
            const sortSelect = document.getElementById('sort-options');
            
            // Function to get current filter values
            function getFilterValues() {
                const priceRange = document.querySelector('input[name="price_range"]:checked');
                const categories = Array.from(document.querySelectorAll('input[name="category[]"]:checked')).map(cb => cb.value);
                
                return {
                    price_range: priceRange ? priceRange.value : null,
                    categories: categories,
                    sort: sortSelect.value
                };
            }
            
            // Function to build URL with filters
            function buildFilterUrl() {
                const filters = getFilterValues();
                const url = new URL(window.location);
                
                // Clear existing filter params
                url.searchParams.delete('price_range');
                url.searchParams.delete('categories');
                url.searchParams.delete('sort');
                
                // Add new filter params
                if (filters.price_range) {
                    url.searchParams.set('price_range', filters.price_range);
                }
                
                if (filters.categories.length > 0) {
                    filters.categories.forEach(category => {
                        url.searchParams.append('categories[]', category);
                    });
                }
                
                if (filters.sort && filters.sort !== 'terbaru') {
                    url.searchParams.set('sort', filters.sort);
                }
                
                return url.toString();
            }
            
            // Apply filters
            applyFiltersBtn.addEventListener('click', function() {
                const url = buildFilterUrl();
                window.location.href = url;
            });
            
            // Clear filters
            clearFiltersBtn.addEventListener('click', function() {
                // Uncheck all checkboxes and radio buttons
                document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
                document.querySelectorAll('input[type="radio"]').forEach(rb => rb.checked = false);
                sortSelect.value = 'terbaru';
                
                // Redirect to clean URL
                const url = new URL(window.location);
                url.searchParams.delete('price_range');
                url.searchParams.delete('categories');
                url.searchParams.delete('sort');
                window.location.href = url.toString();
            });
            
            // Auto-apply sort when changed
            sortSelect.addEventListener('change', function() {
                const url = buildFilterUrl();
                window.location.href = url;
            });
            
            // Set current filter values from URL params
            const urlParams = new URLSearchParams(window.location.search);
            
            // Set price range
            const priceRangeParam = urlParams.get('price_range');
            if (priceRangeParam) {
                const priceRadio = document.querySelector(`input[name="price_range"][value="${priceRangeParam}"]`);
                if (priceRadio) priceRadio.checked = true;
            }
            
            // Set categories
            const categoryParams = urlParams.getAll('categories[]');
            categoryParams.forEach(categorySlug => {
                const categoryCheckbox = document.querySelector(`input[name="category[]"][value="${categorySlug}"]`);
                if (categoryCheckbox) categoryCheckbox.checked = true;
            });
            
            // Set sort
            const sortParam = urlParams.get('sort');
            if (sortParam) {
                sortSelect.value = sortParam;
            }
        });
    </script>
    @endpush
@endsection
