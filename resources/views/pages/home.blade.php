@extends('layouts.app')

@section('content')

    <div class=" bg-gray-50 min-h-screen">
        {{-- Hero Section --}}
        <section class="bg-[#f4f4f4] shadow-3xl flex items-center pt-24 pb-12" data-aos="fade-up">
            <div class="container mx-auto px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

                {{-- Text Left --}}
                <div class="text-center lg:text-left space-y-4">
                    <h1 class="text-4xl md:text-5xl font-bold text-[#686868]">
                        Selamat Datang di
                    </h1>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#484848]">
                        Seventeen
                    </h1>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#484848]">
                        Sports
                    </h1>
                    <p class="text-lg md:text-xl text-[#898989]">
                        Cari Perlengkapan Olahraga Terbaik di Sini!
                    </p>
                    <a href="#kategori"
                        class="inline-block px-6 py-3 bg-[#3a3a3a] text-white font-semibold rounded-lg shadow-md hover:bg-[#2c2c2c] transition">
                        Belanja Sekarang
                    </a>
                </div>

                {{-- Image Right --}}
                <div class="flex justify-center lg:justify-end">
                    <img src="{{ asset('images/herosection2.png') }}" alt="Seventeen Sports"
                        class="w-3/4 md:w-2/3 lg:w-[80%] max-w-md rounded-2xl object-contain">
                </div>

            </div>
        </section>

        <!-- Kategori Populer -->
        @php
            $kategoriPopuler = [
                ['nama' => 'Sepatu Lari', 'slug' => 'sepatu-lari'],
                ['nama' => 'Sepatu Basket', 'slug' => 'sepatu-basket'],
                ['nama' => 'Pakaian Olahraga', 'slug' => 'pakaian-olahraga'],
                ['nama' => 'Aksesoris', 'slug' => 'aksesoris'],
                ['nama' => 'Alat Fitness', 'slug' => 'alat-fitness'],
            ];
        @endphp
        <section id="kategori" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-4" data-aos="fade-up" data-aos-delay="100">
                    Kategori Populer
                </h2>
                
                <p class="text-center text-gray-600 max-w-2xl mx-auto mb-4" data-aos="fade-up">
                    Temukan semua yang Anda butuhkan. Kami telah mengelompokkan produk terbaik kami ke dalam kategori yang
                    mudah dijelajahi.
                </p>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    @foreach ($kategoriPopuler as $index => $kategori)
                        <a href="/kategori/{{ $kategori['slug'] }}"
                            class="group block bg-white shadow-lg rounded-xl overflow-hidden hover:shadow-xl transition-shadow duration-300"
                            data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <img src="https://placehold.co/400x400/EBF8FF/3182CE?text={{ urlencode($kategori['nama']) }}"
                                alt="{{ $kategori['nama'] }}"
                                class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-300 ease-in-out">
                            <div class="p-5">
                                <h3
                                    class="text-center text-lg font-semibold text-gray-700 group-hover:text-blue-600 transition-colors">
                                    {{ $kategori['nama'] }}
                                </h3>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- SECTION BARU: Keunggulan Layanan -->
        <section id="keunggulan" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Deskripsi Section -->
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12" data-aos="fade-up" data-aos-delay="100">
                    Kenapa Memilih Seventeen Sports?
                </h2>
                <p class="text-center text-gray-600 max-w-2xl mx-auto mb-4" data-aos="fade-up">
                    Berbelanja dengan percaya diri. Kami berkomitmen untuk memberikan Anda pengalaman terbaik, dari produk
                    hingga pengiriman.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    <!-- Poin 1: Produk Original -->
                    <div class="text-center p-6 bg-gray-50 rounded-xl shadow-lg transition hover:shadow-xl hover:scale-105"
                        data-aos="fade-up" data-aos-delay="200">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-[#3a3a3a] text-white rounded-full mx-auto">
                            <!-- Ikon Badge/Check -->
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mt-5 mb-2">Produk 100% Original</h3>
                        <p class="text-gray-600 text-sm">Kami menjamin semua produk yang kami jual adalah asli dan
                            berkualitas tinggi.</p>
                    </div>

                    <!-- Poin 2: Gratis Ongkir -->
                    <div class="text-center p-6 bg-gray-50 rounded-xl shadow-lg transition hover:shadow-xl hover:scale-105"
                        data-aos="fade-up" data-aos-delay="300">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-[#3a3a3a] text-white rounded-full mx-auto">
                            <!-- Ikon Truk -->
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.125-.504 1.125-1.125V14.25m-17.25 4.5h10.5m.375-11.25h.625c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125H.375c-.621 0-1.125-.504-1.125-1.125v-1.5c0-.621.504-1.125 1.125-1.125h.625m10.5 0h-4.5" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mt-5 mb-2">Gratis Ongkir</h3>
                        <p class="text-gray-600 text-sm">Nikmati pengiriman gratis ke seluruh Indonesia dengan syarat &
                            ketentuan berlaku.</p>
                    </div>

                    <!-- Poin 3: Layanan Pelanggan -->
                    <div class="text-center p-6 bg-gray-50 rounded-xl shadow-lg transition hover:shadow-xl hover:scale-105"
                        data-aos="fade-up" data-aos-delay="400">
                        <div
                            class="flex items-center justify-center h-16 w-16 bg-[#3a3a3a] text-white rounded-full mx-auto">
                            <!-- Ikon Headset -->
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 18.75a.75.75 0 00.75-.75v-3.75a.75.75 0 00-1.5 0v3.75a.75.75 0 00.75.75zM10.125 12a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zM13.875 12a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zM16.125 12.75a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zM18.375 13.5a.75.75 0 00-1.5 0v.75a.75.75 0 001.5 0v-.75zM19.5 9.75c0 .993-.807 1.8-1.8 1.8s-1.8-.807-1.8-1.8c0-.993.807-1.8 1.8-1.8s1.8.807 1.8 1.8zM4.5 9.75c0 .993.807 1.8 1.8 1.8s1.8-.807 1.8-1.8c0-.993-.807-1.8-1.8-1.8s-1.8.807-1.8 1.8zM12 3.75c-3.41 0-6.172 2.762-6.172 6.172s2.762 6.172 6.172 6.172 6.172-2.762 6.172-6.172S15.41 3.75 12 3.75zM12 1.5c.371 0 .734.027 1.09.081a.75.75 0 01.668.747v.006c0 .414-.336.75-.75.75a5.352 5.352 0 00-1.008.006.75.75 0 01-.747-.668A10.43 10.43 0 0112 1.5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mt-5 mb-2">Layanan Pelanggan</h3>
                        <p class="text-gray-600 text-sm">Tim kami siap membantu Anda kapanpun Anda membutuhkan bantuan atau
                            konsultasi.</p>
                    </div>

                </div>
            </div>
        </section>


        <!-- Produk Unggulan  -->
        @php
            // Dummy data untuk produk unggulan
            $produkUnggulan = [
                [
                    'nama' => 'Sepatu Running Pro',
                    'img_url' => 'https://via.placeholder.com/400x300',
                    'alt_text' => 'Sepatu 1',
                    'deskripsi' => 'Ringan dan nyaman untuk berlari jauh.',
                    'harga' => 'Rp 799.000',
                    'link' => '#',
                ],
                [
                    'nama' => 'Sneakers Casual',
                    'img_url' => 'https://via.placeholder.com/400x300',
                    'alt_text' => 'Sepatu 2',
                    'deskripsi' => 'Desain modern cocok untuk segala gaya.',
                    'harga' => 'Rp 699.000',
                    'link' => '#',
                ],
                [
                    'nama' => 'Sepatu Basket Power',
                    'img_url' => 'https://via.placeholder.com/400x300',
                    'alt_text' => 'Sepatu 3',
                    'deskripsi' => 'Stabil dan kuat untuk permainan cepat.',
                    'harga' => 'Rp 899.000',
                    'link' => '#',
                ],
            ];
        @endphp

        <section class="max-w-7xl mx-auto px-6 py-12">
            
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-4" data-aos="fade-up" data-aos-delay="100">
                Produk Unggulan
            </h2>
            
            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-4" data-aos="fade-up">
                Pilihan terbaik dari yang terbaik. Lihat koleksi produk paling populer dan paling banyak dicari oleh
                pelanggan kami.
            </p>
            <!-- Grid Container -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($produkUnggulan as $index => $produk)
                    <div class="bg-white shadow-lg rounded-xl overflow-hidden hover:scale-105 transition duration-300"
                        data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                        <a href="{{ $produk['link'] }}">
                            <img src="{{ $produk['img_url'] }}" alt="{{ $produk['alt_text'] }}"
                                class="w-full h-56 object-cover">
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-800">{{ $produk['nama'] }}</h3>
                                <p class="text-gray-600 text-sm mt-2">{{ $produk['deskripsi'] }}</p>
                                <span class="block mt-3 text-blue-600 font-semibold">{{ $produk['harga'] }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>


        <!-- SECTION BARU: Testimoni -->
        @php
            $testimonies = [
                [
                    'nama' => 'Budi Santoso',
                    'testi' => 'Pelayanannya cepat, barangnya original. Sepatu larinya mantap!',
                    'rating' => 5,
                    'pekerjaan' => 'Pelari Maraton',
                ],
                [
                    'nama' => 'Citra Lestari',
                    'testi' => 'Akhirnya nemu jersey basket yang saya cari. Kualitasnya top dan pas di badan.',
                    'rating' => 5,
                    'pekerjaan' => 'Pemain Basket',
                ],
                [
                    'nama' => 'Ahmad Yusuf',
                    'testi' => 'Harga bersaing dan banyak pilihan. Pasti akan beli lagi di sini untuk alat fitness.',
                    'rating' => 4,
                    'pekerjaan' => 'Penggemar Olahraga',
                ],
            ];
        @endphp
        <section id="testimoni" class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Deskripsi Section -->
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12" data-aos="fade-up" data-aos-delay="100">
                    Kata Mereka Tentang Kami
                </h2>
                <p class="text-center text-gray-600 max-w-2xl mx-auto mb-4" data-aos="fade-up">
                    Jangan hanya percaya kata kami. Dengarkan apa yang dikatakan oleh para pelanggan setia yang puas dengan
                    produk dan layanan kami.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($testimonies as $index => $testi)
                        <div class="bg-white p-6 rounded-xl shadow-lg space-y-4 flex flex-col justify-between"
                            data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
                            <div>
                                <!-- Star Rating -->
                                <div class="flex text-yellow-400 mb-3">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $testi['rating'])
                                            {{-- Bintang Penuh --}}
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                            </svg>
                                        @else
                                            {{-- Bintang Kosong --}}
                                            <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.31h5.364c.518 0 .734.654.372 1.01l-4.36 3.172a.563.563 0 00-.222.63l1.616 4.99a.563.563 0 01-.814.62l-4.36-3.171a.563.563 0 00-.654 0l-4.36 3.17a.563.563 0 01-.814-.62l1.616-4.99a.563.563 0 00-.222-.63L2.48 9.92c-.362-.356-.146-1.01.372-1.01h5.364a.563.563 0 00.475-.31l2.125-5.111z" />
                                            </svg>
                                        @endif
                                    @endfor
                                </div>
                                <p class="text-gray-600 italic leading-relaxed">"{{ $testi['testi'] }}"</p>
                            </div>
                            <div class="pt-4 border-t border-gray-100 mt-4">
                                <h4 class="font-semibold text-gray-800">{{ $testi['nama'] }}</h4>
                                <p class="text-sm text-gray-500">{{ $testi['pekerjaan'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- CTA Mulai Berbelanja -->
        <section id="cta-belanja" class="py-16 bg-gray-50">
            <div class="max-w-5xl mx-auto px-6">
                
                <div class="bg-white text-gray-800 p-12 md:p-16 rounded-2xl shadow-xl text-center" data-aos="zoom-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">
                        Mulai Petualangan Olahraga Anda
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                        Jelajahi koleksi lengkap kami dan temukan perlengkapan berkualitas tinggi yang Anda butuhkan untuk
                        mencapai target Anda.
                    </p>
                    <a href="/produk"
                        class="inline-block px-8 py-3 bg-[#3a3a3a] text-white font-semibold rounded-lg shadow-md hover:bg-[#2c2c2c] transition text-lg">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        </section>


    </div>
@endsection
