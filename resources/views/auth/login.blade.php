<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Seventeen Sports</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/seventeen2.png') }}" type="image/png">
    {{-- AOS CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans antialiased">

    <!-- Tombol Kembali -->
    <a href="/"
        class="absolute top-6 left-6 z-10 flex items-center gap-2 text-sm font-medium text-gray-700 hover:text-black transition"
        data-aos="fade-in" data-aos-delay="150">
        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali ke Home
    </a>

    {{-- Container utama halaman login --}}
    <div class="min-h-screen flex items-center justify-center pt-24 pb-16 px-4 sm:px-6 lg:px-8">
        {{-- Card Login --}}
        <div class="max-w-md w-full bg-white p-8 md:p-10 rounded-xl shadow-lg" data-aos="fade-up">

            {{-- Header Card --}}
            <div class="text-center mb-8">
                <img src="{{ asset('images/seventeen.png') }}" alt="Logo" class="w-20 h-20 mx-auto mb-4 object-contain"> 
                <h2 class="text-3xl font-bold text-gray-800">Login ke Akun Anda</h2>
                <p class="mt-2 text-sm text-gray-600">
                    Selamat datang kembali!
                </p>
            </div>

            {{-- Form Login --}}
            <form class="space-y-6" action="/login" method="POST"> {{-- Belum selesai --}} 
                @csrf {{-- Token CSRF Laravel --}}

                {{-- Input Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-black focus:border-black sm:text-sm"
                        placeholder="you@example.com">
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Input Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-black focus:border-black sm:text-sm"
                        placeholder="Password">
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Opsi Remember Me & Lupa Password --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">Ingat Saya</label>
                    </div>
                    <div class="text-sm">
                        <a href="#" class="font-medium text-black hover:underline">Lupa password?</a>
                    </div>
                </div>

                {{-- Tombol Submit --}}
                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition duration-150 ease-in-out">
                        Login
                    </button>
                </div>
            </form>

            <!-- Pemisah "atau" -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Belum punya akun?</span>
                </div>
            </div>

            <!-- Tombol Register -->
            <div>
                <a href="/register"
                    class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-black bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black transition duration-150 ease-in-out">
                    Daftar Akun Baru
                </a>
            </div>

        </div>
    </div>

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

</body>

</html>

