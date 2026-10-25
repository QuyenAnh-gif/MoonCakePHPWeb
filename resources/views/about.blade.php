@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
    .font-cursive { font-family: 'Great Vibes', cursive; }
</style>

<!-- NỘI DUNG TRANG GIỚI THIỆU -->
<div class="bg-[#f9f9f9] min-h-screen py-16 font-sans">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb & Tiêu Đề Trang -->
        <div class="mb-16">
            <h1 class="font-title text-4xl text-stone-800 uppercase tracking-widest mb-4">GIỚI THIỆU VỀ DE LUNE BAKERY</h1>
            <div class="flex items-center text-sm text-stone-500 gap-2">
                <a href="{{ url('/') }}" class="hover:text-mordan-red transition">Home</a>
                <span>&gt;</span>
                <span class="text-stone-800">Giới Thiệu Về De Lune Bakery</span>
            </div>
        </div>

        <div class="space-y-24">
            
            <!-- Khối 1: Ảnh TRÁI - Chữ PHẢI -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="flex justify-center">
                    <img src="{{ isset($settings['about_img_1']) ? asset('storage/' . $settings['about_img_1']) : 'https://images.unsplash.com/photo-1631520626359-99464e83fdf4?q=80&w=600&auto=format&fit=crop' }}" class="w-full max-w-sm drop-shadow-xl hover:scale-105 transition-transform duration-500 rounded-full aspect-square object-cover border-4 border-white shadow-2xl">
                </div>
                <div>
                    <h2 class="font-title text-3xl font-bold text-stone-800 uppercase mb-6 tracking-wide">{{ $settings['about_title_1'] ?? 'GIỚI THIỆU DE LUNE BAKERY' }}</h2>
                    <div class="text-stone-600 leading-relaxed space-y-4 text-justify">
                        <p>{!! nl2br(e($settings['about_content_1'] ?? 'De Lune Bakery là thương hiệu các dòng bánh hiện đại. Với phong cách tân tiến, De Lune du nhập các loại hương vị từ nhiều quốc gia trên thế giới để tạo thành một phong cách riêng biệt và mới lạ. Danh mục các dòng bánh luôn được cải cách và cập nhật những hương vị mới nhất theo xu hướng quốc tế.')) !!}</p>
                    </div>
                </div>
            </div>

            <!-- Khối 2: Chữ TRÁI - Ảnh PHẢI (zic zắc) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <h2 class="font-title text-3xl font-bold text-stone-800 uppercase mb-6 tracking-wide">{{ $settings['about_title_2'] ?? 'QUÀ TẶNG DE LUNE BAKERY' }}</h2>
                    <div class="text-stone-600 leading-relaxed space-y-4 text-justify">
                        <p>{!! nl2br(e($settings['about_content_2'] ?? 'De Lune tự hào là nhà cung cấp uy tín các sản phẩm phục vụ nhu cầu biếu tặng vào các dịp Tết Trung Thu, Tết Âm Lịch và các dịp sự kiện đặc biệt khác. Với phương châm "ưu tiên chất lượng, hình thức bắt mắt và ý nghĩa", các sản phẩm luôn là sự lựa chọn tối ưu để làm quà tặng.')) !!}</p>
                    </div>
                </div>
                <div class="order-1 md:order-2 flex justify-center">
                    <img src="{{ isset($settings['about_img_2']) ? asset('storage/' . $settings['about_img_2']) : 'https://images.unsplash.com/photo-1542840410-3092f99611a3?q=80&w=600&auto=format&fit=crop' }}" class="w-full max-w-sm drop-shadow-xl hover:-translate-y-2 transition-transform duration-500 rounded-lg">
                </div>
            </div>

            <!-- Khối 3: Ảnh TRÁI - Chữ PHẢI -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="flex justify-center relative">
                    <!-- Hình hoa văn trang trí nền -->
                    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
                    <img src="{{ isset($settings['about_img_3']) ? asset('storage/' . $settings['about_img_3']) : 'https://images.unsplash.com/photo-1517594422361-5e1f81d4a04d?q=80&w=600&auto=format&fit=crop' }}" class="w-full max-w-sm drop-shadow-2xl rounded-2xl relative z-10 border border-stone-200">
                </div>
                <div>
                    <h2 class="font-title text-3xl font-bold text-stone-800 uppercase mb-6 tracking-wide">{{ $settings['about_title_3'] ?? 'TẦM NHÌN & SỨ MỆNH' }}</h2>
                    <div class="text-stone-600 leading-relaxed space-y-4 text-justify">
                        <p>{!! nl2br(e($settings['about_content_3'] ?? 'Không ngừng cải tiến để mang lại những chiếc bánh ngon nhất, đẹp nhất và dịch vụ chu đáo nhất. Chúng tôi khao khát đưa nghệ thuật làm bánh truyền thống vươn tầm quốc tế, đồng thời là cầu nối để mọi người gửi trao tình cảm chân thành qua từng hộp quà De Lune cao cấp.')) !!}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection