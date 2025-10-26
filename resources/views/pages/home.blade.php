@extends('layouts.app')

@section('content')

    <div class="bg-white min-h-screen">
        {{-- Hero Section --}}
        <section class="bg-white flex items-center pt-24 pb-12" data-aos="fade-up">
            <div class="container mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                {{-- Text Left --}}
                <div class="text-center lg:text-left space-y-6">
                    {{-- Premium Badge --}}
                    <div class="flex items-center justify-center lg:justify-start gap-2">
                        <!-- <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg> -->
                        <span class="text-sm font-medium text-gray-600">
                            
                        </span>
                    </div>
                    
                    <h1 class="text-4xl md:text-6xl font-bold text-black leading-tight">
                        Koleksi Seventeen Sports Official
                    </h1>
                    
                    <p class="text-lg md:text-xl text-gray-600 max-w-lg">
                        Temukan gaya terbaikmu dengan koleksi peralatan olahraga terbaik. Cocok untuk aktivitas olahraga, jogging, dan lainnya.
                    </p>
                    
                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#kategori"
                            class="inline-flex items-center justify-center px-8 py-4 bg-black text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition">
                            Belanja Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a href="/produk"
                            class="inline-flex items-center justify-center px-8 py-4 border-2 border-black text-black font-semibold rounded-lg hover:bg-black hover:text-white transition">
                            Lihat Koleksi
                        </a>
                    </div>
                    
                    {{-- Stats --}}
                    <div class="flex flex-col sm:flex-row gap-6 pt-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.148 3.227-1.667 4.771-4.919 4.919-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.07-1.646-.07-4.85s.012-3.584.07-4.85C2.333 3.935 3.786 2.416 7.037 2.235 8.302 2.175 8.682 2.163 12 2.163zm0 1.626c-3.14 0-3.483.011-4.71.069-2.73.123-3.95 1.34-4.07 4.07-.058 1.226-.069 1.569-.069 4.71s.011 3.483.069 4.71c.123 2.73 1.34 3.95 4.07 4.07 1.226.058 1.569.069 4.71.069s3.483-.011 4.71-.069c2.73-.123 3.95-1.34 4.07-4.07.058-1.226.069-1.569.069-4.71s-.011-3.483-.069-4.71c-.123-2.73-1.34-3.95-4.07-4.07-1.226-.058-1.569-.069-4.71-.069zM12 6.875A5.125 5.125 0 1 0 12 17.125A5.125 5.125 0 1 0 12 6.875zm0 8.626A3.5 3.5 0 1 1 12 8.5a3.5 3.5 0 0 1 0 7zm4.875-8.25a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-600">1000+ Produk Terjual</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                            <span class="text-sm font-medium text-gray-600">4.9/5 Google Rating</span>
                        </div>
                    </div>
                </div>

                {{-- Image Right --}}
                <div class="flex justify-center lg:justify-end relative">
                    <div class="relative">
                        <img src="{{ asset('images/herosection2.png') }}" alt="Seventeen Sports"
                            class="w-full max-w-md rounded-2xl object-contain">
                        {{-- Premium Quality Badge --}}
                        <div class="absolute bottom-4 right-4 bg-white px-3 py-2 rounded-lg shadow-lg flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                            <span class="text-sm font-medium text-gray-800">Premium Quality</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Kategori Unggulan -->
        <section id="kategori" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                
                <h2 class="text-3xl font-bold text-center text-black mb-4" data-aos="fade-up" data-aos-delay="100">
                    Kategori Unggulan
                </h2>
                
                <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12" data-aos="fade-up">
                    Temukan koleksi produk premium yang dirancang khusus untuk memberikan yang terbaik bagi Si Kecil tercinta
                </p>
                
                @if($categories->count() > 0)
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    @foreach ($categories as $index => $category)
                        <a href="/kategori/{{ $category->slug }}"
                            class="group block bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300"
                            data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <img src="https://placehold.co/400x400/F3F4F6/374151?text={{ urlencode($category->name) }}"
                                alt="{{ $category->name }}"
                                class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out">
                            <div class="p-5">
                                <h3
                                    class="text-center text-lg font-semibold text-gray-700 group-hover:text-black transition-colors">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
                @else
                <div class="text-center py-12">
                    <p class="text-gray-500">Belum ada kategori tersedia</p>
                </div>
                @endif
            </div>
        </section>


        <!-- Mengapa Memilih Kami -->
        <section id="keunggulan" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Deskripsi Section -->
                <h2 class="text-3xl font-bold text-center text-black mb-4" data-aos="fade-up" data-aos-delay="100">
                    Mengapa Memilih Kami
                </h2>
                <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12" data-aos="fade-up">
                    Dedikasi mendalam untuk menghadirkan pengalaman berbelanja terbaik dengan standar kualitas tertinggi
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Poin 1: Kualitas Terjamin -->
                    <div class="text-center p-6 bg-white rounded-xl shadow-lg transition hover:shadow-xl hover:scale-105"
                        data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-black text-white rounded-full mx-auto">
                            <!-- Ikon Shield/Check -->
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black mt-5 mb-2">Kualitas Terjamin</h3>
                        <p class="text-gray-600 text-sm">Produk terbaik dengan standar kualitas tinggi untuk buah hati Anda</p>
                    </div>

                    <!-- Poin 2: Pengiriman Cepat -->
                    <div class="text-center p-6 bg-white rounded-xl shadow-lg transition hover:shadow-xl hover:scale-105"
                        data-aos="fade-up" data-aos-delay="300">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-black text-white rounded-full mx-auto">
                            <!-- Ikon Truck -->
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.125-.504 1.125-1.125V14.25m-17.25 4.5h10.5m.375-11.25h.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125H.375c-.621 0-1.125-.504-1.125-1.125v-1.5c0-.621.504-1.125 1.125-1.125h.625m10.5 0h-4.5" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black mt-5 mb-2">Pengiriman Cepat</h3>
                        <p class="text-gray-600 text-sm">Layanan pengiriman cepat ke seluruh Indonesia</p>
                    </div>

                    <!-- Poin 3: Pelayanan Terbaik -->
                    <div class="text-center p-6 bg-white rounded-xl shadow-lg transition hover:shadow-xl hover:scale-105"
                        data-aos="fade-up" data-aos-delay="400">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-black text-white rounded-full mx-auto">
                            <!-- Ikon Heart -->
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-black mt-5 mb-2">Pelayanan Terbaik</h3>
                        <p class="text-gray-600 text-sm">Dukungan pelanggan 24/7 untuk membantu Anda</p>
                    </div>

                </div>
            </div>
        </section>


        <!-- Produk Unggulan  -->
        <section class="max-w-7xl mx-auto px-6 py-12 bg-white">
            
            <h2 class="text-3xl font-bold text-center text-black mb-4" data-aos="fade-up" data-aos-delay="100">
                Produk Unggulan
            </h2>
            
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12" data-aos="fade-up">
                Pilihan terbaik yang telah dipercaya ribuan keluarga untuk kualitas dan keamanan terjamin
            </p>
            
            @if($featuredProducts->count() > 0)
            <!-- Grid Container -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredProducts as $index => $product)
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition duration-300"
                        data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <a href="/produk/{{ $product->slug }}">
                            <img src="{{ $product->image_url }}" 
                                alt="{{ $product->name }}"
                                class="w-full h-56 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800">{{ $product->name }}</h3>
                                <p class="text-gray-600 text-sm mt-2">{{ Str::limit($product->description, 80) }}</p>
                                <span class="block mt-3 text-black font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <p class="text-gray-500">Belum ada produk tersedia</p>
            </div>
            @endif
        </section>


        <!-- Apa Kata Mereka -->
        <section id="testimoni" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Deskripsi Section -->
                <h2 class="text-3xl font-bold text-center text-black mb-4" data-aos="fade-up" data-aos-delay="100">
                    Apa Kata Mereka
                </h2>
                <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12" data-aos="fade-up">
                    Cerita inspiratif dari keluarga yang telah merasakan manfaat luar biasa dari produk berkualitas kami
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($testimonials as $index => $testimonial)
                        <div class="bg-white p-6 rounded-xl shadow-lg space-y-4"
                            data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div class="flex items-start justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $testimonial['avatar'] }}" 
                                        alt="{{ $testimonial['name'] }}"
                                        class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <h4 class="font-semibold text-black">{{ $testimonial['name'] }}</h4>
                                        <p class="text-sm text-gray-500">{{ $testimonial['time_ago'] }}</p>
                                    </div>
                                </div>
                                <svg class="w-5 h-5 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                            </div>
                            
                            <!-- Star Rating -->
                            <div class="flex text-yellow-400">
                                @for ($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $testimonial['review'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Location Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center text-black mb-8" data-aos="fade-up">
                    Location Seventeen Sports
                </h2>
                <div class="bg-gray-100 p-6 rounded-xl" data-aos="fade-up" data-aos-delay="200">
                    <p class="text-center text-gray-600 mb-6">
                        Jl. Mataram, Kota Tegal, Jawa Tengah 52471
                    </p>
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <div class="flex items-center justify-center gap-2 mb-2">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium text-gray-700">Seventeen Sports</span>
                        </div>
                        <div class="flex items-center justify-center gap-4 text-sm text-gray-600">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span>5.0</span>
                            </div>
                            <span>91 ulasan</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Final -->
        <section id="cta-belanja" class="py-16 bg-gray-50">
            <div class="max-w-5xl mx-auto px-6">
                <div class="bg-white text-black p-12 md:p-16 rounded-2xl shadow-xl text-center" data-aos="zoom-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        Peralatan olahraga Terbaik untuk Setiap Gaya
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                        Temukan koleksi peralatan olahraga terbaru dengan desain elegan, kualitas terbaik, dan harga terjangkau.
                    </p>
                    <a href="/produk"
                        class="inline-flex items-center justify-center px-8 py-4 bg-black text-white font-semibold rounded-lg shadow-md hover:bg-gray-800 transition text-lg">
                        Lihat peralatan olahraga
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection
