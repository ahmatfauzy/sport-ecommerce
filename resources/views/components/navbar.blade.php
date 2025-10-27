<nav id="main-navbar" class="bg-white shadow-sm fixed w-full z-50 top-0 left-0 transition-shadow duration-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center relative">

        <!-- Logo -->
        <a href="/" class="flex items-center space-x-2">
            <span class="text-2xl font-bold text-black">SEVENTEEN SPORTS</span>
        </a>

        <!-- Menu Desktop -->
        <ul class="hidden md:flex space-x-8 text-gray-700 font-medium">
            <li>
                <a href="/"
                    class="relative font-semibold text-gray-800 hover:text-black transition duration-300
                    after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-black after:left-0 after:-bottom-1 
                    hover:after:w-full after:transition-all after:duration-300">
                    Home
                </a>
            </li>
            <li>
                <a href="/produk"
                    class="relative font-semibold text-gray-800 hover:text-black transition duration-300
                    after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-black after:left-0 after:-bottom-1 
                    hover:after:w-full after:transition-all after:duration-300">
                    Produk
                </a>
            </li>
            <li>
                <a href="/tentang"
                    class="relative font-semibold text-gray-800 hover:text-black transition duration-300
                    after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-black after:left-0 after:-bottom-1 
                    hover:after:w-full after:transition-all after:duration-300">
                    Tentang
                </a>
            </li>
        </ul>

        <!-- Ikon Desktop (Search, Auth, Cart) -->
        <div class="hidden md:flex items-center space-x-4 relative">
            <div class="relative flex items-center">
                <!-- 🔍 FORM SEARCH BERFUNGSI TANPA MENGUBAH STYLE -->
                <form action="{{ url('/produk/cari') }}" method="GET" class="flex items-center space-x-2">
                    <div
                        class="group flex items-center border border-gray-300 rounded-full px-3 py-1.5 bg-gray-50 transition-all duration-300 
        focus-within:ring-1 focus-within:ring-black w-36 hover:w-60 focus-within:w-60 absolute right-0 top-1/2 -translate-y-1/2 ">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-gray-500 group-focus-within:text-black transition-colors duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                        <input type="text" name="q" 
                        placeholder="Cari produk..."
                        class="ml-2 outline-none text-sm bg-transparent w-full transition-all duration-300 h-6">
                    </div>
                </form>
            </div>

            @auth
                <!-- User Menu -->
                <div class="relative" id="user-menu">
                    <button id="user-menu-button"
                        class="flex items-center space-x-2 text-black hover:text-gray-600 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
                        <svg id="dropdown-arrow" class="w-4 h-4 transition-transform duration-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="user-dropdown"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 opacity-0 invisible transition-all duration-200">
                        @if (Auth::user()->role === 'admin')
                            <a href="/admin/dashboard"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard Admin</a>
                        @endif
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="/orders" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pesanan Saya</a>
                        <form method="POST" action="/logout" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <a href="/login"
                    class="bg-black text-white px-4 py-1.5 rounded-full text-sm font-semibold hover:bg-gray-800 transition">Login</a>
                <a href="/register"
                    class="border border-black text-black px-4 py-1.5 rounded-full text-sm font-semibold hover:bg-black hover:text-white transition">Daftar</a>
            @endauth

            <a href='/keranjang'
                class="border border-gray-300 rounded-full p-2 shadow-sm hover:bg-gray-100 transition focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 7h13l-1.5-7M9 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                </svg>
            </a>
        </div>

        <!-- Tombol Menu Mobile -->
        <button id="menu-btn"
            class="md:hidden text-black focus:outline-none z-50 w-7 h-7 flex flex-col justify-center items-center space-y-1.5 p-1">
            <span id="burger-line-1"
                class="block w-full h-0.5 bg-black transition-all duration-300 ease-in-out origin-center"></span>
            <span id="burger-line-2" class="block w-full h-0.5 bg-black transition-all duration-300 ease-in-out"></span>
            <span id="burger-line-3"
                class="block w-full h-0.5 bg-black transition-all duration-300 ease-in-out origin-center"></span>
        </button>
    </div>

    <!-- Menu Flyout Mobile -->
    <div id="mobile-menu"
        class="md:hidden bg-white border-t border-gray-200 shadow-md absolute w-full left-0 top-full z-40
                max-h-0 opacity-0 invisible overflow-hidden transition-all duration-500 ease-in-out">
        <ul class="flex flex-col px-6 py-4 space-y-3 text-gray-700 font-medium">
            <li><a href="/" class="block py-1 hover:text-black transition">Home</a></li>
            <li><a href="/produk" class="block py-1 hover:text-black transition">Produk</a></li>
            <li><a href="/tentang" class="block py-1 hover:text-black transition">Tentang</a></li>
        </ul>
    </div>
</nav>


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            const line1 = document.getElementById('burger-line-1');
            const line2 = document.getElementById('burger-line-2');
            const line3 = document.getElementById('burger-line-3');

            if (menuBtn && mobileMenu && line1 && line2 && line3) {
                menuBtn.addEventListener('click', () => {

                    const isOpening = mobileMenu.classList.contains('max-h-0');

                    if (isOpening) {
                        // Buka Menu
                        mobileMenu.classList.remove('max-h-0', 'opacity-0', 'invisible');
                        mobileMenu.classList.add('max-h-96', 'opacity-100', 'visible');
                        // Animasi Ikon Burger -> X
                        line1.classList.add('rotate-45',
                            'translate-y-[8px]'); // Sesuaikan translate-y jika perlu
                        line2.classList.add('opacity-0');
                        line3.classList.add('-rotate-45',
                            '-translate-y-[8px]'); // Sesuaikan translate-y jika perlu

                    } else {
                        // Tutup Menu
                        mobileMenu.classList.remove('max-h-96', 'opacity-100', 'visible');
                        mobileMenu.classList.add('max-h-0', 'opacity-0', 'invisible');
                        // Animasi Ikon X -> Burger
                        line1.classList.remove('rotate-45', 'translate-y-[8px]');
                        line2.classList.remove('opacity-0');
                        line3.classList.remove('-rotate-45', '-translate-y-[8px]');
                    }
                });
            } else {
                console.error('Elemen menu mobile atau burger lines tidak ditemukan.');
            }

            // --- SCRIPT: User Dropdown Menu ---
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');
            const dropdownArrow = document.getElementById('dropdown-arrow');

            if (userMenuButton && userDropdown && dropdownArrow) {
                userMenuButton.addEventListener('click', (e) => {
                    e.stopPropagation();

                    const isOpen = userDropdown.classList.contains('opacity-100');

                    if (isOpen) {
                        // Tutup dropdown
                        userDropdown.classList.remove('opacity-100', 'visible');
                        userDropdown.classList.add('opacity-0', 'invisible');
                        dropdownArrow.classList.remove('rotate-180');
                    } else {
                        // Buka dropdown
                        userDropdown.classList.remove('opacity-0', 'invisible');
                        userDropdown.classList.add('opacity-100', 'visible');
                        dropdownArrow.classList.add('rotate-180');
                    }
                });

                // Tutup dropdown saat klik di luar
                document.addEventListener('click', (e) => {
                    if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target)) {
                        userDropdown.classList.remove('opacity-100', 'visible');
                        userDropdown.classList.add('opacity-0', 'invisible');
                        dropdownArrow.classList.remove('rotate-180');
                    }
                });
            }

            // --- SCRIPT: Animasi Navbar Scroll ---
            const navbar = document.getElementById('main-navbar');
            if (navbar) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 10) {
                        // Saat di-scroll ke bawah, ganti shadow
                        navbar.classList.add('shadow-lg');
                        navbar.classList.remove('shadow-sm');
                    } else {
                        // Saat di paling atas, kembalikan shadow
                        navbar.classList.add('shadow-sm');
                        navbar.classList.remove('shadow-lg');
                    }
                });
            } else {
                console.error('Elemen navbar utama tidak ditemukan.');
            }
        });
    </script>
@endpush
