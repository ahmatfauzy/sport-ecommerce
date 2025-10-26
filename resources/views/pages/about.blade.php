@extends('layouts.app')

@section('content')
    {{-- Container utama halaman About --}}
    <div class="bg-gray-50 pt-24 pb-16"> 

        {{-- Hero Section Halaman About --}}
        <section class="bg-[#f4f4f4] py-16 mb-16 shadow-sm" data-aos="fade-down">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800">Tentang Seventeen Sports</h1>
                <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto">
                    Mengenal lebih dekat siapa kami dan apa yang mendorong semangat kami dalam menyediakan perlengkapan olahraga terbaik.
                </p>
            </div>
        </section>

        {{-- Konten Utama: Cerita Kami & Misi --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">

            
                <div class="mb-12 lg:mb-0" data-aos="fade-right">
                    <img src="{{asset("images/shoesflow (3).png")}}" alt="Tim Seventeen Sports" class="w-full h-auto object-cover rounded-lg">
                </div>

                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Cerita Kami</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Seventeen Sports lahir dari kecintaan kami terhadap dunia olahraga dan keinginan untuk memudahkan para pegiat olahraga mendapatkan perlengkapan berkualitas tinggi. Kami percaya bahwa peralatan yang tepat dapat meningkatkan performa dan menambah semangat dalam beraktivitas. Berawal dari toko kecil, kini kami hadir secara online untuk menjangkau lebih banyak lagi pencinta olahraga di seluruh Indonesia.
                    </p>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Misi Kami</h2>
                    <p class="text-gray-600 leading-relaxed mb-6">
                        Misi kami adalah menjadi mitra terpercaya bagi setiap individu dalam perjalanan olahraga mereka. Kami berkomitmen untuk:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-gray-600 mb-6">
                        <li>Menyediakan produk olahraga original dan berkualitas dari merek-merek ternama.</li>
                        <li>Memberikan pengalaman belanja online yang mudah, aman, dan menyenangkan.</li>
                        <li>Menawarkan harga yang kompetitif dan layanan pelanggan yang responsif.</li>
                        <li>Menginspirasi gaya hidup aktif dan sehat melalui produk yang kami tawarkan.</li>
                    </ul>
                     <a href="/produk"
                           class="inline-block px-6 py-3 bg-[#3a3a3a] text-white font-semibold rounded-lg shadow-md hover:bg-[#2c2c2c] transition">
                           Lihat Koleksi Kami
                     </a>
                </div>
            </div>
        </div>

        {{-- Section Nilai-Nilai Kami (Opsional) --}}
        <section class="py-16 mt-16 bg-white" data-aos="fade-up">
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Nilai-Nilai Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    
                    <div class="text-center p-6" data-aos="fade-up" data-aos-delay="100">
                         <div class="flex items-center justify-center h-16 w-16 bg-gray-100 text-[#3a3a3a] rounded-full mx-auto mb-4">
                             
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kualitas</h3>
                        <p class="text-gray-600 text-sm">Kami hanya menawarkan produk asli dengan standar kualitas terbaik.</p>
                    </div>
                     
                    <div class="text-center p-6" data-aos="fade-up" data-aos-delay="200">
                         <div class="flex items-center justify-center h-16 w-16 bg-gray-100 text-[#3a3a3a] rounded-full mx-auto mb-4">
                             
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Pelanggan</h3>
                        <p class="text-gray-600 text-sm">Kepuasan Anda adalah prioritas utama kami dalam setiap layanan.</p>
                    </div>
                     
                    <div class="text-center p-6" data-aos="fade-up" data-aos-delay="300">
                         <div class="flex items-center justify-center h-16 w-16 bg-gray-100 text-[#3a3a3a] rounded-full mx-auto mb-4">
                             
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Integritas</h3>
                        <p class="text-gray-600 text-sm">Kami berbisnis dengan jujur, transparan, dan bertanggung jawab.</p>
                    </div>
                </div>
             </div>
        </section>

    </div>
@endsection
