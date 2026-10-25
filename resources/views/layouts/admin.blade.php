<!DOCTYPE html>
<html lang="vi" class="h-full bg-slate-50">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - De Lune Bakery</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,400&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mordan-darkred': '#4A0E17',
                        'mordan-red': '#8B151B',
                        'mordan-gold': '#C5A059',
                        'mordan-lightgold': '#E6D0A8',
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
<body class="h-full font-sans text-slate-700 antialiased flex overflow-hidden">

    <!-- SIDEBAR BÊN TRÁI -->
    <aside class="w-64 bg-white border-r border-slate-200 flex flex-col flex-shrink-0 shadow-sm z-20">
        <!-- Logo / Thương hiệu -->
        <div class="h-16 px-6 border-b border-slate-100 flex items-center justify-between bg-mordan-darkred">
            <a href="/" target="_blank" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-full border border-mordan-gold bg-mordan-red text-mordan-gold font-title font-bold text-sm flex items-center justify-center">D</div>
                <div>
                    <span class="font-title text-base font-bold text-white tracking-widest block leading-none">DE LUNE</span>
                    <span class="text-[8px] uppercase tracking-wider text-mordan-gold block mt-0.5">Admin Management</span>
                </div>
            </a>
        </div>

        <!-- Cây danh mục Sidebar (Menu Items) -->
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            
            <!-- 1. Bảng điều khiển -->
            <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-sm font-semibold transition {{ request()->routeIs('admin.settings.*') ? 'bg-amber-400 text-slate-900 shadow-sm' : 'text-slate-600 hover:bg-slate-100' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Bảng điều khiển</span>
            </a>

            <!-- NHÓM: SẢN PHẨM & THỰC ĐƠN -->
            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400">Quản lý thực đơn</div>

            <a href="{{ route('admin.products.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.products.*') ? 'bg-slate-100 text-mordan-red font-bold' : 'text-slate-600 hover:bg-slate-100' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    <span>Quản lý Bánh / Combo</span>
                </div>
                <span class="text-xs text-slate-400">&rsaquo;</span>
            </a>

            <!-- NHÓM: NỘI DUNG CMS -->
            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400">Giao diện & Trang tĩnh</div>

            <a href="{{ route('admin.settings.index') }}" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium transition {{ request()->routeIs('admin.settings.index') ? 'text-mordan-red font-bold bg-slate-50' : 'text-slate-600 hover:bg-slate-100' }}">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <span>Cấu hình Trang chủ</span>
                </div>
                <span class="text-xs text-slate-400">&rsaquo;</span>
            </a>

            <a href="{{ route('admin.settings.index') }}#about-settings" class="flex items-center justify-between px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 transition">
                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    <span>Trang Giới thiệu</span>
                </div>
                <span class="text-xs text-slate-400">&rsaquo;</span>
            </a>

            <!-- NHÓM: HỆ THỐNG -->
            <div class="pt-4 pb-1 px-3 text-[11px] font-bold uppercase tracking-wider text-slate-400">Hệ thống</div>

            <a href="/" target="_blank" class="flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 transition">
                <svg class="w-5 h-5 flex-shrink-0 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Xem web thực tế</span>
            </a>
        </nav>

        <!-- Đăng xuất ở chân Sidebar -->
        <div class="p-3 border-t border-slate-100">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3.5 py-2 rounded-lg text-sm font-semibold text-rose-600 hover:bg-rose-50 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    <span>Đăng xuất</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- NỘI DUNG CHÍNH (BÊN PHẢI) -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- TOPBAR TRÊN CÙNG -->
        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between flex-shrink-0">
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium text-slate-500">Xin chào,</span>
                <span class="text-sm font-bold text-slate-800">{{ auth()->user()->name ?? 'Admin' }}</span>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('admin.settings.index') }}" class="p-2 text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-full transition" title="Cài đặt">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </a>
                <div class="h-8 w-px bg-slate-200"></div>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-mordan-red text-white font-bold flex items-center justify-center text-xs">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <span class="text-xs font-semibold text-slate-700 hidden sm:inline">Nhà quản trị</span>
                </div>
            </div>
        </header>

        <!-- KHU VỰC HIỂN THỊ NỘI DUNG CUỘN ĐƯỢC -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8 bg-slate-50">
            @if(session('success'))
                <div class="mb-6 p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 rounded-lg bg-rose-50 border border-rose-200 text-rose-800 text-sm font-semibold flex items-center gap-2">
                    <svg class="w-5 h-5 text-rose-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>