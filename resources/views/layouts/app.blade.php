<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sport Ecommerce' }}</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/seventeen2.png') }}" type="image/png">
    
    <!-- CSS untuk Animasi AOS (Animate on Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Konten utama --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')


    <!-- JS untuk Animasi AOS (Animate on Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>

        AOS.init({
            duration: 700, 
            once: true,    
        });
    </script>

    @stack('scripts')

</body>
</html>

