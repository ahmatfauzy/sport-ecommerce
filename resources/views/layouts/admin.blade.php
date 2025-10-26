<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel - Sport Ecommerce' }}</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('images/seventeen2.png') }}" type="image/png">
    
    <!-- CSS untuk Animasi AOS (Animate on Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">
    
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white flex flex-col">
            <!-- Logo -->
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <p class="text-sm text-gray-400">Sport Ecommerce</p>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="/admin/dashboard" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">
                            <i class="fas fa-tachometer-alt mr-3"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="/admin/categories" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">
                            <i class="fas fa-tags mr-3"></i>
                            Categories
                        </a>
                    </li>
                    <li>
                        <a href="/admin/products" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">
                            <i class="fas fa-box mr-3"></i>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="/admin/orders" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">
                            <i class="fas fa-shopping-cart mr-3"></i>
                            Orders
                        </a>
                    </li>
                    <li>
                        <a href="/admin/users" class="flex items-center px-4 py-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition">
                            <i class="fas fa-users mr-3"></i>
                            Users
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- User Info -->
            <div class="p-4 border-t border-gray-700">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-gray-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-sm"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Admin User</p>
                        <p class="text-xs text-gray-400">admin@example.com</p>
                    </div>
                </div>
                <a href="/logout" class="block mt-2 text-sm text-gray-400 hover:text-white">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $pageTitle ?? 'Dashboard' }}</h2>
                    <div class="flex items-center space-x-4">
                        <a href="/" class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-home mr-2"></i>
                            View Site
                        </a>
                        <div class="w-8 h-8 bg-gray-200 rounded-full"></div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

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
