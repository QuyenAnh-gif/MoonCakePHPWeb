<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>De Lune Bakery - Tuyệt Phẩm Bánh Trung Thu</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mordan-darkred': '#4A0E17',
                        'mordan-red': '#8B151B',
                        'mordan-gold': '#C5A059',
                        'mordan-lightgold': '#E6D0A8',
                        'mordan-cream': '#F9F6F0',
                    },
                    fontFamily: {
                        'title': ['"Playfair Display"', 'serif'],
                        'sans': ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-stone-100 text-stone-800 font-sans antialiased flex flex-col selection:bg-mordan-gold selection:text-white">

    <!-- Header / Navbar chung -->
    <header class="bg-mordan-darkred text-white border-b border-mordan-gold/30 sticky top-0 z-50 shadow-md">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            <!-- Phía Trái: Logo -->
            <a href="/" class="flex items-center gap-3 group shrink-0">
                <div class="w-10 h-10 rounded-full border border-mordan-gold flex items-center justify-center bg-mordan-red text-mordan-gold font-title font-bold text-lg">
                    D
                </div>
                <div>
                    <span class="font-title text-xl font-bold tracking-widest text-mordan-lightgold uppercase block">De Lune</span>
                    <span class="text-[9px] uppercase tracking-[0.25em] text-mordan-gold block -mt-1">Artisanal Bakery</span>
                </div>
            </a>

            <!-- Ở Giữa: Menu Khách Hàng -->
            <nav class="hidden lg:flex items-center gap-6 xl:gap-10 text-[13px] font-bold tracking-wider uppercase">
                <a href="{{ url('/') }}" class="text-mordan-lightgold hover:text-white transition {{ request()->is('/') ? 'border-b-2 border-mordan-gold pb-1' : '' }}">Trang Chủ</a>
                <a href="{{ route('about') }}" class="text-mordan-lightgold hover:text-white transition {{ request()->routeIs('about') ? 'border-b-2 border-mordan-gold pb-1' : '' }}">Giới Thiệu</a>
                <a href="{{ url('/#collection') }}" class="text-mordan-lightgold hover:text-white transition">Bộ Sưu Tập</a>
            </nav>

            <!-- Phía Phải: Menu Admin + Giỏ Hàng + Tài Khoản -->
            <div class="flex items-center gap-5 xl:gap-8">
                
                @auth
                    @if(auth()->user()->role === 'admin')
                        <!-- Nhóm Admin (Có viền phân cách) -->
                        <div class="hidden xl:flex items-center gap-4 border-r border-mordan-gold/30 pr-6">
                            <a href="{{ route('admin.products.index') }}" class="text-[11px] uppercase tracking-widest text-mordan-gold hover:text-white transition font-bold {{ request()->routeIs('admin.products.*') ? 'border-b border-mordan-gold pb-1' : '' }}">
                                Quản Lý Sản Phẩm
                            </a>
                            <a href="{{ route('admin.settings.index') }}" class="text-[11px] uppercase tracking-widest text-mordan-gold hover:text-white transition font-bold {{ request()->routeIs('admin.settings.*') ? 'border-b border-mordan-gold pb-1' : '' }}">
                                Cài Đặt Giao Diện
                            </a>
                        </div>
                    @endif
                @endauth

                <!-- Giỏ Hàng -->
                <a href="{{ route('cart.index') }}" class="relative text-mordan-lightgold hover:text-white transition flex items-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    @php $cartCount = session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0; @endphp
                    <span id="cart-counter" class="absolute -top-2 -right-2 bg-mordan-red text-white text-[10px] font-bold w-4 h-4 rounded-full flex items-center justify-center border border-mordan-gold shadow-md">{{ $cartCount }}</span>
                </a>

                <!-- Tài Khoản / Auth -->
                <div class="flex items-center gap-3 shrink-0">
                    @auth
                        <span class="text-xs text-mordan-lightgold hidden sm:inline">Xin chào, <strong class="text-white">{{ auth()->user()->name }}</strong></span>
                        <form action="{{ route('logout') }}" method="POST" class="inline m-0">
                            @csrf
                            <button type="submit" class="text-[11px] font-bold uppercase tracking-wider bg-mordan-red hover:bg-red-900 text-white px-4 py-2 rounded-sm transition border border-mordan-gold/40 shadow-sm">
                                Đăng Xuất
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-[11px] font-bold uppercase tracking-widest bg-mordan-gold text-mordan-darkred px-5 py-2.5 rounded-sm hover:bg-white transition shadow-sm">
                            Đăng Nhập
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex flex-col relative w-full">
        <!-- Khu vực hiển thị thông báo -->
        @if(session('success'))
            <div id="flash-message-success" class="max-w-7xl mx-auto px-4 mt-6 w-full relative z-50 transition-opacity duration-500 ease-in-out">
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 shadow-sm text-sm font-medium flex justify-between items-center rounded-r-md">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="document.getElementById('flash-message-success').style.display='none'" class="text-green-500 hover:text-green-800 focus:outline-none px-2 text-lg font-bold">
                        &times;
                    </button>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div id="flash-message-error" class="max-w-7xl mx-auto px-4 mt-6 w-full relative z-50 transition-opacity duration-500 ease-in-out">
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 shadow-sm text-sm font-medium flex justify-between items-center rounded-r-md">
                    <span>{{ session('error') }}</span>
                    <button type="button" onclick="document.getElementById('flash-message-error').style.display='none'" class="text-red-500 hover:text-red-800 focus:outline-none px-2 text-lg font-bold">
                        &times;
                    </button>
                </div>
            </div>
        @endif

        <!-- Script tự động ẩn thông báo sau 5 giây -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    const successMsg = document.getElementById('flash-message-success');
                    const errorMsg = document.getElementById('flash-message-error');
                    
                    if (successMsg) {
                        successMsg.style.opacity = '0';
                        setTimeout(() => successMsg.style.display = 'none', 500); // Ẩn hoàn toàn sau khi làm mờ
                    }
                    if (errorMsg) {
                        errorMsg.style.opacity = '0';
                        setTimeout(() => errorMsg.style.display = 'none', 500);
                    }
                }, 5000); // 5000ms = 5 giây
            });
        </script>

        <!-- Nội dung động của các trang sẽ được chèn vào đây -->
        @yield('content')
    </main>

    <!-- Footer chung -->
    <footer class="bg-mordan-darkred text-mordan-lightgold py-12 border-t border-mordan-gold/30 shrink-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-4">
            <h2 class="font-title text-2xl font-bold tracking-widest text-white">DE LUNE BAKERY</h2>
            <p class="text-xs text-stone-300 tracking-wider">Tinh hoa nghệ thuật làm bánh thủ công truyền thống & hiện đại.</p>
            <div class="w-16 h-[1px] bg-mordan-gold mx-auto"></div>
            <p class="text-[11px] text-stone-400">&copy; 2026 De Lune Bakery. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>