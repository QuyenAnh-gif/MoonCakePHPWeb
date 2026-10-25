@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col justify-center py-20 relative bg-mordan-darkred overflow-hidden">
    
    <!-- Background Ảnh & Lớp phủ mờ -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('assets/images/banner-bg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-t from-mordan-darkred via-mordan-darkred/80 to-transparent"></div>
    </div>

    <!-- Form Đăng Ký -->
    <div class="relative z-10 w-full max-w-md mx-auto px-4 sm:px-0">
        <div class="bg-mordan-darkred/40 backdrop-blur-md border border-mordan-gold/30 rounded-2xl shadow-2xl p-8 md:p-10">
            
            <div class="text-center mb-8">
                <h1 class="font-title text-3xl md:text-4xl font-bold text-mordan-gold tracking-widest uppercase mb-2">Đăng Ký</h1>
                <p class="text-mordan-lightgold text-sm tracking-wider">Trở thành thành viên của De Lune Bakery</p>
                <div class="w-16 h-[1px] bg-mordan-gold/50 mx-auto mt-4"></div>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                
                <!-- Họ và Tên -->
                <div>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus
                           placeholder="Họ và Tên của bạn" 
                           class="w-full bg-mordan-cream/90 text-stone-800 text-sm px-5 py-4 rounded-md focus:outline-none focus:ring-2 focus:ring-mordan-gold border-none shadow-inner placeholder-stone-500 transition-all">
                    @error('name')
                        <span class="text-rose-400 text-xs mt-2 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                           placeholder="Nhập địa chỉ Email" 
                           class="w-full bg-mordan-cream/90 text-stone-800 text-sm px-5 py-4 rounded-md focus:outline-none focus:ring-2 focus:ring-mordan-gold border-none shadow-inner placeholder-stone-500 transition-all">
                    @error('email')
                        <span class="text-rose-400 text-xs mt-2 block font-medium">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div>
                    <input type="password" name="password" required 
                           placeholder="Tạo Mật khẩu (Ít nhất 8 ký tự)" 
                           class="w-full bg-mordan-cream/90 text-stone-800 text-sm px-5 py-4 rounded-md focus:outline-none focus:ring-2 focus:ring-mordan-gold border-none shadow-inner placeholder-stone-500 transition-all">
                    @error('password')
                        <span class="text-rose-400 text-xs mt-2 block font-medium">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Xác nhận Mật khẩu -->
                <div>
                    <input type="password" name="password_confirmation" required 
                           placeholder="Xác nhận lại Mật khẩu" 
                           class="w-full bg-mordan-cream/90 text-stone-800 text-sm px-5 py-4 rounded-md focus:outline-none focus:ring-2 focus:ring-mordan-gold border-none shadow-inner placeholder-stone-500 transition-all">
                </div>

                <!-- Nút Tạo tài khoản -->
                <div class="pt-2">
                    <button type="submit" class="w-full bg-mordan-gold hover:bg-white text-mordan-darkred hover:text-red-900 font-bold uppercase tracking-widest text-sm py-4 rounded-md shadow-[0_0_15px_rgba(197,160,89,0.3)] transition-all duration-300">
                        Tạo Tài Khoản Mới
                    </button>
                </div>
            </form>
            
            <!-- Link Quay lại Đăng Nhập -->
            <div class="mt-8 text-center border-t border-mordan-gold/20 pt-6">
                <p class="text-xs text-mordan-lightgold">
                    Đã có tài khoản? 
                    <a href="{{ route('login') }}" class="text-white hover:text-mordan-gold font-bold uppercase tracking-wider ml-1 transition">Đăng nhập</a>
                </p>
            </div>

        </div>
    </div>
</div>
@endsection