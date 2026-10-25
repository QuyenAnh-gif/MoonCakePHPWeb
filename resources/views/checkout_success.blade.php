@extends('layouts.app')

@section('content')
<div class="flex-1 flex flex-col justify-center items-center py-20 relative bg-mordan-cream overflow-hidden">
    
    <!-- Pattern Nền ẩn -->
    <div class="absolute inset-0 opacity-5 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 1440 400" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M-100,200 C200,50 500,350 800,200 C1100,50 1400,250 1600,200" stroke="#C5A059" stroke-width="2" stroke-dasharray="10 5" fill="none"/>
            <path d="M-100,250 C300,400 700,0 1600,250" stroke="#C5A059" stroke-width="1" fill="none"/>
        </svg>
    </div>

    <div class="relative z-10 w-full max-w-2xl mx-auto px-4 text-center">
        <!-- Icon Success Animation -->
        <div class="w-24 h-24 mx-auto bg-white rounded-full flex items-center justify-center border-4 border-mordan-gold shadow-[0_0_30px_rgba(197,160,89,0.3)] mb-8 relative">
            <div class="absolute inset-0 rounded-full border border-mordan-gold animate-ping opacity-20"></div>
            <svg class="w-12 h-12 text-mordan-darkred" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="font-title text-4xl md:text-5xl font-bold text-stone-900 mb-4 tracking-wide">Đặt Hàng Thành Công!</h1>
        <div class="w-16 h-[2px] bg-mordan-red mx-auto mb-6"></div>
        
        <p class="text-stone-600 text-base md:text-lg mb-8 leading-relaxed">
            Cảm ơn bạn đã lựa chọn tuyệt phẩm bánh Trung Thu tại <strong class="text-mordan-darkred font-bold">De Lune Bakery</strong>. <br class="hidden md:block">
            Đơn hàng của bạn đã được ghi nhận. Nhân viên CSKH sẽ liên hệ với bạn trong vòng 24h để xác nhận thông tin giao hàng.
        </p>

        <div class="bg-white p-6 md:p-8 rounded-xl border border-stone-200 shadow-sm mb-10 max-w-md mx-auto text-left relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full bg-mordan-gold"></div>
            @if(session('success'))
                <!-- Bắt mã đơn hàng từ thông báo Flash Message của Controller truyền sang -->
                @php 
                    $msg = session('success'); 
                    $orderCode = substr($msg, strpos($msg, "#") + 1);
                @endphp
                <p class="text-sm text-stone-500 uppercase tracking-widest font-bold mb-1">Mã Đơn Hàng Của Bạn:</p>
                <p class="text-3xl font-title font-bold text-mordan-red tracking-widest">#{{ $orderCode }}</p>
            @else
                <p class="text-sm text-stone-500 uppercase tracking-widest font-bold mb-1">Trạng Thái Đơn Hàng:</p>
                <p class="text-2xl font-title font-bold text-mordan-red">Chờ Xử Lý</p>
            @endif
        </div>

        <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
            <a href="{{ route('home') }}" class="w-full sm:w-auto px-8 py-4 bg-mordan-darkred hover:bg-mordan-gold text-white font-bold uppercase tracking-widest text-xs rounded-sm shadow-md transition-colors duration-300">
                Tiếp Tục Mua Sắm
            </a>
            @auth
                <!-- Nút này dành cho bản mở rộng: Theo dõi đơn hàng trong Profile -->
                <a href="#" class="w-full sm:w-auto px-8 py-4 bg-white border border-stone-200 hover:border-mordan-gold text-stone-700 hover:text-mordan-darkred font-bold uppercase tracking-widest text-xs rounded-sm shadow-sm transition-all duration-300">
                    Theo Dõi Đơn Hàng
                </a>
            @endauth
        </div>
        
        <p class="font-['Great_Vibes'] text-2xl text-stone-400 mt-12 mb-[-20px]">De Lune Bakery</p>
    </div>
</div>
@endsection