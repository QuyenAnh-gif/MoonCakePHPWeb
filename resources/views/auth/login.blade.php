@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col justify-center py-20 relative bg-mordan-darkred overflow-hidden">
    
    <!-- Background Ảnh & Lớp phủ mờ -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/images/banner-bg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-t from-mordan-darkred via-mordan-darkred/80 to-transparent"></div>
    </div>

    <!-- Form Đăng Nhập -->
    <div class="relative z-10 w-full max-w-md mx-auto px-4 sm:px-0">
        <div class="bg-mordan-darkred/40 backdrop-blur-md border border-mordan-gold/30 rounded-2xl shadow-2xl p-8 md:p-10">
            
            <div class="text-center mb-8">
                <h1 class="font-title text-3xl md:text-4xl font-bold text-mordan-gold tracking-widest uppercase mb-2">Đăng Nhập</h1>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                
                <!-- Email -->
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           placeholder="Nhập địa chỉ Email" 
                           class="w-full bg-mordan-cream/90 text-stone-800 text-sm px-5 py-4 rounded-md focus:outline-none focus:ring-2 focus:ring-mordan-gold border-none shadow-inner placeholder-stone-500 transition-all">
                    @error('email')
                        <span class="text-rose-400 text-xs mt-2 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div>
                    <input type="password" name="password" required 
                           placeholder="Nhập Mật khẩu" 
                           class="w-full bg-mordan-cream/90 text-stone-800 text-sm px-5 py-4 rounded-md focus:outline-none focus:ring-2 focus:ring-mordan-gold border-none shadow-inner placeholder-stone-500 transition-all">
                    @error('password')
                        <span class="text-rose-400 text-xs mt-2 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Ghi nhớ & Quên Mật Khẩu -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-mordan-gold/50 text-mordan-red focus:ring-mordan-gold bg-mordan-cream/90 cursor-pointer">
                        <span class="text-mordan-lightgold group-hover:text-white transition">Ghi nhớ đăng nhập</span>
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-mordan-gold hover:text-white transition font-medium">
                            Quên mật khẩu?
                        </a>
                    @endif
                </div>

                <!-- Nút Đăng nhập -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-mordan-red hover:bg-red-900 text-white font-bold uppercase tracking-widest text-sm py-4 rounded-md shadow-[0_0_15px_rgba(197,160,89,0.3)] border border-mordan-gold/50 transition-all duration-300">
                        Đăng Nhập Hệ Thống
                    </button>
                </div>
            </form>
            
            <div class="mt-8 text-center border-t border-mordan-gold/20 pt-6">
                <p class="text-xs text-mordan-lightgold">
                    Chưa có tài khoản? 
                    <a href="{{ route('register') }}" class="text-mordan-gold hover:text-white font-bold uppercase tracking-wider ml-1 transition">Đăng ký ngay</a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection