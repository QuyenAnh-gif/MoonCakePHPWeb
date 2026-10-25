@extends('layouts.app')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
    .font-cursive { font-family: 'Great Vibes', cursive; }
</style>

<!-- Thanh liên hệ nổi bên phải -->
<div class="fixed right-4 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-4">
    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform border border-stone-200"><span class="text-[#0068ff] font-bold text-sm tracking-tighter">Zalo</span></a>
    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform border border-stone-200"><svg class="w-6 h-6 text-mordan-red" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg></a>
    <a href="#" class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform border border-stone-200"><svg class="w-7 h-7 text-[#0084ff]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.145 2 11.26c0 2.923 1.5 5.516 3.816 7.184.2.14.333.37.317.61l-.226 2.05c-.063.58.528 1.01 1.05.76l2.355-1.12c.2-.09.43-.1.64-.02C10.638 21.056 11.31 21.14 12 21.14c5.523 0 10-4.145 10-9.26S17.523 2 12 2zm1 9.87l-2.43-2.61c-.34-.36-.88-.41-1.28-.11l-3.32 2.45c-.46.34.12.97.55.65l2.43-1.8c.34-.25.81-.22 1.11.09l2.43 2.61c.34.36.88.41 1.28.11l3.32-2.45c.46-.34-.12-.97-.55-.65l-2.43 1.8c-.34.25-.81.22-1.11-.09z"/></svg></a>
    <a href="#" class="w-12 h-12 bg-mordan-darkred rounded-full flex items-center justify-center shadow-2xl hover:scale-110 transition-transform border border-mordan-gold"><span class="text-[9px] uppercase font-bold text-mordan-gold text-center leading-tight">Cata<br>logue</span></a>
</div>

<!-- 1. HERO BANNER VIDEO -->
<section class="relative h-[85vh] flex items-center justify-center overflow-hidden bg-mordan-darkred">
    <div class="absolute inset-0 z-0">
        <video autoplay loop muted playsinline class="w-full h-full object-cover scale-105">
            <source src="{{ isset($settings['hero_video']) ? asset('storage/' . $settings['hero_video']) : asset('assets/videos/hero-video.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-mordan-darkred/70 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-mordan-darkred via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-16">
        <span class="inline-block text-xs md:text-sm uppercase tracking-[0.3em] text-mordan-gold font-bold mb-4 border-b border-mordan-gold pb-2">Tuyệt tác mùa trăng 2026</span>
        <h1 class="font-title text-5xl md:text-7xl font-bold tracking-tight text-white mb-6 drop-shadow-lg">
            De Lune <br/><span class="text-mordan-gold italic font-normal text-4xl md:text-6xl">Royal Collection</span>
        </h1>
        <p class="text-mordan-lightgold text-base md:text-lg mb-10 font-light tracking-wide max-w-2xl mx-auto drop-shadow leading-relaxed opacity-90">Đánh thức mọi giác quan với nghệ thuật làm bánh thủ công thượng hạng. Mỗi chiếc bánh là một câu chuyện trân quý gửi trao tâm giao mùa đoàn viên.</p>
        <a href="#collection" class="inline-block bg-mordan-gold hover:bg-white text-mordan-darkred font-bold px-8 py-3.5 rounded-full uppercase text-sm tracking-widest transition duration-300 transform hover:scale-105 shadow-[0_0_20px_rgba(197,160,89,0.4)]">Khám Phá Ngay</a>
    </div>
</section>

<!-- 2. BRAND STORY -->
<section class="py-24 bg-mordan-cream relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-mordan-gold rounded-full blur-[100px] opacity-20 -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-mordan-red rounded-full blur-[100px] opacity-10 translate-y-1/2 -translate-x-1/3"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <img src="{{ isset($settings['brand_story']) ? asset('storage/' . $settings['brand_story']) : asset('assets/images/brand-story.jpg') }}" class="w-full h-[600px] object-cover rounded-t-[150px] rounded-b-xl shadow-2xl" />
                <div class="absolute -bottom-6 -right-6 bg-white p-8 shadow-2xl rounded-tl-[3rem] border border-stone-100 hidden md:block">
                    <span class="font-title text-5xl font-bold text-mordan-red">30<span class="text-3xl">+</span></span>
                    <p class="text-xs uppercase tracking-widest text-stone-500 font-bold mt-2">Năm Kế Thừa</p>
                </div>
            </div>
            <div class="space-y-8">
                <div class="flex items-center space-x-4">
                    <div class="h-[2px] w-12 bg-mordan-gold"></div>
                    <span class="text-sm uppercase tracking-[0.2em] text-mordan-gold font-bold">Nghệ Thuật Thủ Công</span>
                </div>
                <h2 class="font-title text-4xl md:text-5xl font-bold text-stone-900 leading-tight">Hương vị của <br/> <span class="italic text-mordan-red font-normal">Sự Đoàn Viên</span></h2>
                <div class="space-y-4 text-stone-600 leading-relaxed text-justify">
                    <p>Khởi nguồn từ một xưởng bánh gia đình năm 1996, De Lune Bakery luôn gìn giữ trọn vẹn tinh hoa ẩm thực truyền thống. Chúng tôi khắt khe trong từng công đoạn: từ việc chọn lọc những hạt sen căng mẩy, trứng muối hảo hạng 35 ngày, đến nhào nặn vỏ bánh.</p>
                    <p>Mùa trung thu này, De Lune tự hào mang đến bộ sưu tập bánh nướng, bánh dẻo hoàng kim - một bản giao hưởng hương vị đánh thức ký ức tuổi thơ nhưng không kém phần sang trọng.</p>
                </div>
                <div class="pt-6">
                    <p class="font-['Great_Vibes'] text-xl text-stone-900 mt-2 whitespace-nowrap">Quyen Anh <span class="font-sans text-[10px] italic tracking-[0.2em] uppercase">— De Lune Owner</span></p>                   
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. BỘ SƯU TẬP VIDEO -->
<section class="py-24 relative bg-mordan-darkred bg-cover bg-center overflow-hidden" 
         @if(isset($settings['vertical_bg'])) style="background-image: url('{{ asset('storage/' . $settings['vertical_bg']) }}');" @endif>
    
    @if(isset($settings['vertical_bg']))
        <div class="absolute inset-0 bg-mordan-darkred/80 mix-blend-multiply pointer-events-none"></div>
    @endif

    <div class="absolute inset-0 opacity-10 pointer-events-none">
        <svg class="w-full h-full" viewBox="0 0 1440 400" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M-100,200 C200,50 500,350 800,200 C1100,50 1400,250 1600,200" stroke="#C5A059" stroke-width="2" stroke-dasharray="10 5" fill="none"/>
            <path d="M-100,250 C300,400 700,0 1600,250" stroke="#C5A059" stroke-width="1" fill="none"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="flex justify-center lg:justify-end">
                <div class="relative w-full max-w-[320px] aspect-[9/16] bg-mordan-red rounded-2xl overflow-hidden shadow-[0_0_50px_rgba(197,160,89,0.3)] border-2 border-mordan-gold/40 group">
                    @if(isset($settings['vertical_video']))
                        <video autoplay loop muted playsinline class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition duration-700">
                            <source src="{{ asset('storage/' . $settings['vertical_video']) }}" type="video/mp4">
                        </video>
                    @else
                        <img src="{{ isset($settings['vertical_cover']) ? asset('storage/' . $settings['vertical_cover']) : asset('assets/images/vertical-cover.jpg') }}" class="w-full h-full object-cover opacity-90 group-hover:scale-105 transition duration-700">
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-mordan-darkred/90 via-transparent to-mordan-darkred/40 pointer-events-none"></div>
                    <div class="absolute top-4 left-4 right-4 flex items-center gap-3 z-10 pointer-events-none">
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center lg:items-start text-center lg:text-left space-y-2">
                <div class="w-36 h-36 rounded-full border-2 border-mordan-gold/40 flex items-center justify-center p-3 mb-8 bg-mordan-red shadow-[0_0_40px_rgba(197,160,89,0.3)]">
                    <div class="w-full h-full rounded-full border border-mordan-gold border-dashed flex flex-col items-center justify-center bg-mordan-darkred">
                        <svg class="w-8 h-8 text-mordan-gold mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        <span class="font-title text-mordan-gold text-base font-bold tracking-widest">DE LUNE</span>
                        <span class="text-[9px] text-mordan-gold tracking-[0.2em] uppercase mt-0.5">Bakery</span>
                    </div>
                </div>
                <div class="space-y-4">
                    <h3 class="font-cursive text-5xl sm:text-6xl text-mordan-cream font-light tracking-wider -rotate-2 -ml-4">Hương Vị</h3>
                    <h2 class="font-title text-5xl sm:text-7xl font-bold text-mordan-gold tracking-widest uppercase drop-shadow-[0_5px_5px_rgba(0,0,0,0.5)]">ĐẶC SẮC</h2>
                    <h3 class="font-cursive text-5xl sm:text-6xl text-mordan-cream font-light tracking-wider -rotate-2 ml-12 sm:ml-20 pt-4">Chất Lượng</h3>
                    <h2 class="font-title text-5xl sm:text-7xl font-bold text-mordan-gold tracking-widest uppercase drop-shadow-[0_5px_5px_rgba(0,0,0,0.5)]">THƯỢNG HẠNG</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. LƯỚI SẢN PHẨM -->
<section id="collection" class="py-24 bg-mordan-cream relative scroll-mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 space-y-4 text-stone-800">
            <span class="text-sm uppercase tracking-[0.2em] text-mordan-gold font-bold">Thực Đơn 2026</span>
            <h2 class="font-title text-4xl md:text-5xl font-bold">Tuyệt Phẩm <span class="italic text-mordan-red font-normal">Trăng Rằm</span></h2>
            <div class="w-24 h-[2px] bg-mordan-gold mx-auto mt-6"></div>
        </div>

        <!-- ================= BỘ LỌC VÀ PHÂN LOẠI (AJAX KHÔNG CHỚP TRANG) ================= -->
        <div class="mb-12 flex flex-col md:flex-row items-center justify-between gap-6 bg-white p-4 rounded-xl shadow-sm border border-stone-100 relative z-10">
            <div class="w-full flex flex-col xl:flex-row justify-between items-center gap-6">
                
                <!-- Nhóm Nút Danh Mục Bánh -->
                <div class="flex flex-wrap items-center justify-center md:justify-start gap-2" id="category-filters">
                    <button type="button" data-category="" class="filter-btn px-6 py-2.5 rounded-full text-[11px] font-bold uppercase tracking-wider transition-all {{ !request('category') ? 'bg-mordan-darkred text-white shadow-md' : 'bg-stone-50 border border-stone-200 text-stone-500 hover:bg-stone-200 hover:text-stone-800' }}">
                        Tất cả Bánh
                    </button>
                    @if(isset($categories))
                        @foreach($categories as $cat)
                            <button type="button" data-category="{{ $cat->id }}" class="filter-btn px-6 py-2.5 rounded-full text-[11px] font-bold uppercase tracking-wider transition-all {{ request('category') == $cat->id ? 'bg-mordan-darkred text-white shadow-md' : 'bg-stone-50 border border-stone-200 text-stone-500 hover:bg-stone-200 hover:text-stone-800' }}">
                                {{ $cat->name }}
                            </button>
                        @endforeach
                    @endif
                </div>

                <!-- Dropdown Sắp xếp -->
                <div class="flex items-center gap-3 w-full xl:w-auto justify-center xl:justify-end border-t xl:border-t-0 border-stone-100 pt-4 xl:pt-0">
                    <span class="text-[11px] uppercase font-bold text-stone-400 tracking-wider whitespace-nowrap">Sắp xếp:</span>
                    <div class="relative min-w-[220px]">
                        <select id="sort-select" class="appearance-none w-full text-sm bg-stone-50 border border-stone-200 text-stone-700 py-2.5 pl-4 pr-10 rounded-lg focus:outline-none focus:border-mordan-gold focus:ring-1 focus:ring-mordan-gold cursor-pointer font-medium shadow-sm transition">
                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>🌟 Nổi bật / Mới nhất</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>📈 Giá: Từ thấp đến cao</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>📉 Giá: Từ cao đến thấp</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-stone-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= LƯỚI HIỂN THỊ (VÙNG AJAX CONTAINER) ================= -->
        <div id="product-list-container" class="relative min-h-[400px]">
            <!-- Màn hình Loading mờ -->
            <div id="loading-overlay" class="absolute inset-0 bg-mordan-cream/60 backdrop-blur-[2px] z-20 flex flex-col items-center justify-center opacity-0 pointer-events-none transition-opacity duration-300">
                <svg class="animate-spin h-10 w-10 text-mordan-darkred mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                <span class="text-xs font-bold tracking-widest uppercase text-mordan-darkred">Đang lọc...</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                    <div class="group bg-white rounded-xl overflow-hidden hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.15)] transition-all duration-500 border border-stone-200 flex flex-col">
                        <div class="relative aspect-[4/5] overflow-hidden bg-stone-50">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1631520626359-99464e83fdf4?q=80&w=1974&auto=format&fit=crop' }}" class="w-full h-full object-cover group-hover:scale-110 group-hover:-rotate-2 transition-transform duration-700 ease-out">
                            <div class="absolute top-4 left-4 flex flex-col gap-2"><span class="bg-mordan-red text-white text-[10px] font-bold px-3 py-1.5 rounded-sm uppercase tracking-wider shadow-lg">{{ $product->category->name ?? 'Giới hạn' }}</span></div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div class="text-center space-y-3">
                                <h3 class="font-title text-lg font-bold text-stone-800 group-hover:text-mordan-red transition-colors line-clamp-2">{{ $product->name }}</h3>
                                <p class="text-xs text-stone-500 line-clamp-2 leading-relaxed px-2">{{ $product->description }}</p>
                            </div>
                            <div class="mt-6 pt-5 border-t border-stone-100 flex flex-col items-center gap-4">
                                <span class="text-xl font-bold text-mordan-red tracking-wide">{{ number_format($product->price, 0, ',', '.') }} <span class="text-sm underline">đ</span></span>
                                
                                <!-- Thanh chọn số lượng (- / +) -->
                                <div class="flex items-center border border-stone-200 rounded-sm overflow-hidden bg-stone-50 w-32 shadow-inner">
                                    <button type="button" class="qty-dec px-3 py-1.5 text-stone-600 hover:bg-stone-200 transition font-bold select-none">-</button>
                                    <input type="number" name="quantity" value="1" min="1" class="product-qty w-full text-center bg-transparent text-sm font-bold text-stone-800 focus:outline-none [-appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" />
                                    <button type="button" class="qty-inc px-3 py-1.5 text-stone-600 hover:bg-stone-200 transition font-bold select-none">+</button>
                                </div>

                                <button type="button" data-id="{{ $product->id }}" class="add-to-cart-btn w-full text-xs uppercase tracking-widest bg-mordan-darkred hover:bg-mordan-gold text-white font-bold py-3.5 rounded-sm transition-colors shadow-md">Thêm Vào Giỏ</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 flex flex-col items-center justify-center text-center">
                        <svg class="w-16 h-16 text-stone-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 12H4M8 16l-4-4 4-4M16 8l4 4-4 4"/></svg>
                        <p class="text-stone-500 font-medium text-lg">Không tìm thấy sản phẩm nào phù hợp với bộ lọc.</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Phân trang -->
            <div class="mt-16 flex justify-center">{{ $products->links() }}</div>
        </div>
    </div>
</section>

<!-- 5. HỘP QUÀ BIẾU TẶNG DOANH NGHIỆP -->
<section class="relative py-24 bg-mordan-darkred bg-fixed bg-center bg-cover border-y-8 border-mordan-gold" style="background-image: url('{{ isset($settings['banner_bg']) ? asset('storage/' . $settings['banner_bg']) : asset('assets/images/banner-bg.jpg') }}');">
    <div class="absolute inset-0 bg-mordan-darkred/95 mix-blend-multiply"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-title text-4xl md:text-5xl font-bold text-mordan-lightgold mb-4">Hộp Quà Biếu Tặng Doanh Nghiệp</h2>
        <p class="text-mordan-cream mb-12 text-base md:text-lg leading-relaxed max-w-2xl mx-auto opacity-90">Chiết khấu lên đến <span class="text-mordan-gold font-bold text-xl">25%</span> cho đơn hàng số lượng lớn. Thiết kế hộp gỗ bọc nhung cao cấp, in logo doanh nghiệp mạ vàng dập nổi độc quyền.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 @if(isset($settings['set_4'])) lg:grid-cols-4 @else lg:grid-cols-3 max-w-5xl mx-auto @endif gap-6 mb-16">
            
            <!-- Set 1: Bách Diệp Thu Yến -->
            <div class="bg-mordan-red/30 backdrop-blur-md border border-mordan-gold/20 p-6 rounded-lg hover:border-mordan-gold transition-colors duration-300 group text-left shadow-lg flex flex-col justify-between">
                <div>
                    <div class="aspect-[3/4] overflow-hidden rounded mb-6 bg-stone-900">
                        <img src="{{ isset($settings['set_tu_quy']) ? asset('storage/' . $settings['set_tu_quy']) : asset('assets/images/set-tu-quy.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <h3 class="font-title text-xl font-bold text-mordan-lightgold mb-2">Set Bách Diệp Thu Yến</h3>
                    <p class="text-sm text-mordan-cream/70 mb-4 line-clamp-2">Gồm 4 bánh nướng thượng hạng (150g) và 1 hộp trà Ô Long sâm cao cấp.</p>
                </div>
                <div class="flex justify-between items-center border-t border-mordan-gold/20 pt-4 mt-auto">
                    <span class="text-mordan-gold font-bold text-lg">850.000 đ</span>
                    <button class="text-xs uppercase tracking-widest text-white hover:text-mordan-gold transition">Chi tiết &rarr;</button>
                </div>
            </div>

            <!-- Set 2: Song Lân Khai Phúc -->
            <div class="bg-mordan-red/40 backdrop-blur-md border border-mordan-gold/40 p-6 rounded-lg hover:border-mordan-gold transition-colors duration-300 group text-left relative transform md:-translate-y-4 shadow-[0_0_30px_rgba(197,160,89,0.2)] flex flex-col justify-between">
                <div class="absolute -top-3 right-4 bg-mordan-gold text-mordan-darkred text-[10px] font-bold px-3 py-1 rounded-sm uppercase z-20 tracking-wider">Bán chạy nhất</div>
                <div>
                    <div class="aspect-[3/4] overflow-hidden rounded mb-6 border border-mordan-gold/20 bg-stone-900">
                        <img src="{{ isset($settings['set_luc_bao']) ? asset('storage/' . $settings['set_luc_bao']) : asset('assets/images/set-luc-bao.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <h3 class="font-title text-xl font-bold text-mordan-lightgold mb-2">Set Song Lân Khai Phúc</h3>
                    <p class="text-sm text-mordan-cream/70 mb-4 line-clamp-2">Gồm 6 bánh nướng/dẻo (150g) dập vàng lá 24K, kèm bình rượu vang đỏ Chile.</p>
                </div>
                <div class="flex justify-between items-center border-t border-mordan-gold/20 pt-4 mt-auto">
                    <span class="text-mordan-gold font-bold text-lg">1.550.000 đ</span>
                    <button class="text-xs uppercase tracking-widest text-white hover:text-mordan-gold transition">Chi tiết &rarr;</button>
                </div>
            </div>

            <!-- Set 3: Diệu Nguyệt Trung Thu -->
            <div class="bg-mordan-red/30 backdrop-blur-md border border-mordan-gold/20 p-6 rounded-lg hover:border-mordan-gold transition-colors duration-300 group text-left shadow-lg flex flex-col justify-between">
                <div>
                    <div class="aspect-[3/4] overflow-hidden rounded mb-6 bg-stone-900">
                        <img src="{{ isset($settings['set_phu_quy']) ? asset('storage/' . $settings['set_phu_quy']) : asset('assets/images/set-phu-quy.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <h3 class="font-title text-xl font-bold text-mordan-lightgold mb-2">Set Diệu Nguyệt Trung Thu</h3>
                    <p class="text-sm text-mordan-cream/70 mb-4 line-clamp-2">Gồm 8 bánh nướng mini (80g) đa dạng hương vị, hộp gỗ nguyên khối khắc laser.</p>
                </div>
                <div class="flex justify-between items-center border-t border-mordan-gold/20 pt-4 mt-auto">
                    <span class="text-mordan-gold font-bold text-lg">1.200.000 đ</span>
                    <button class="text-xs uppercase tracking-widest text-white hover:text-mordan-gold transition">Chi tiết &rarr;</button>
                </div>
            </div>

            <!-- Set 4: Mẫu Hộp Tùy Chọn Mới -->
            @if(isset($settings['set_4']))
            <div class="bg-mordan-red/30 backdrop-blur-md border border-mordan-gold/20 p-6 rounded-lg hover:border-mordan-gold transition-colors duration-300 group text-left shadow-lg flex flex-col justify-between">
                <div>
                    <div class="aspect-[3/4] overflow-hidden rounded mb-6 bg-stone-900">
                        <img src="{{ asset('storage/' . $settings['set_4']) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <h3 class="font-title text-xl font-bold text-mordan-lightgold mb-2">Mẫu Hộp Cao Cấp Mới</h3>
                    <p class="text-sm text-mordan-cream/70 mb-4 line-clamp-2">Liên hệ trực tiếp qua Zalo hoặc Hotline để xem chi tiết thiết kế dành riêng cho bạn.</p>
                </div>
                <div class="flex justify-between items-center border-t border-mordan-gold/20 pt-4 mt-auto">
                    <span class="text-mordan-gold font-bold text-lg">Liên Hệ</span>
                    <button class="text-xs uppercase tracking-widest text-white hover:text-mordan-gold transition">Chi tiết &rarr;</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- 6. BỘ SƯU TẬP COMBO -->
<section class="py-24 relative bg-mordan-darkred bg-cover bg-center overflow-hidden" 
         @if(isset($settings['combo_bg'])) style="background-image: url('{{ asset('storage/' . $settings['combo_bg']) }}');" @endif>
    
    @if(isset($settings['combo_bg']))
        <div class="absolute inset-0 bg-mordan-darkred/80 mix-blend-multiply pointer-events-none"></div>
    @endif

    <div class="absolute top-0 inset-x-0 h-px bg-mordan-gold/20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-12">
            <h2 class="font-title text-4xl md:text-5xl font-bold text-mordan-lightgold uppercase tracking-[0.15em] mb-1">DE LUNE BAKERY</h2>
            <h3 class="font-cursive text-4xl md:text-5xl text-white mt-[-10px] tracking-wider font-light">Collection 2026</h3>
            
            <div class="flex items-center justify-center my-6 gap-2">
                <div class="h-[1px] w-20 md:w-32 bg-mordan-gold"></div>
                <div class="w-2.5 h-2.5 rotate-45 border border-mordan-gold"></div>
                <div class="h-[1px] w-20 md:w-32 bg-mordan-gold"></div>
            </div>
            
            <p class="text-mordan-cream/80 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">Bộ sưu tập bánh Trung Thu De Lune Bakery mang tinh thần thanh lịch đương đại, hòa quyện cùng hương vị hảo hạng, tạo nên món quà ý nghĩa cho mùa Đoàn Viên thêm trọn vẹn.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
            <!-- Combo Bạch Nguyệt -->
            <div class="bg-gradient-to-b from-mordan-lightgold to-[#e6d0a8] p-5 pt-6 flex flex-col items-center group cursor-pointer shadow-[0_10px_30px_rgba(0,0,0,0.3)] hover:-translate-y-2 transition-transform duration-500 border border-mordan-gold/30">
                <div class="text-center mb-4">
                    <h4 class="font-title text-mordan-darkred text-xs uppercase tracking-widest font-semibold">COMBO</h4>
                    <h3 class="font-title text-mordan-darkred text-2xl font-bold mt-[-2px]">Bạch Nguyệt</h3>
                </div>
                <div class="w-full aspect-[3/4] overflow-hidden mt-auto bg-stone-200 rounded-sm shadow-inner">
                    <img src="{{ isset($settings['combo_2']) ? asset('storage/' . $settings['combo_2']) : asset('assets/images/combo-2.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            <!-- Combo Lụa Mây -->
            <div class="bg-gradient-to-b from-mordan-lightgold to-[#e6d0a8] p-5 pt-6 flex flex-col items-center group cursor-pointer shadow-[0_10px_30px_rgba(0,0,0,0.3)] hover:-translate-y-2 transition-transform duration-500 border border-mordan-gold/30">
                <div class="text-center mb-4">
                    <h4 class="font-title text-mordan-darkred text-xs uppercase tracking-widest font-semibold">COMBO</h4>
                    <h3 class="font-title text-mordan-darkred text-2xl font-bold mt-[-2px]">Lụa Mây</h3>
                </div>
                <div class="w-full aspect-[3/4] overflow-hidden mt-auto bg-stone-200 rounded-sm shadow-inner">
                    <img src="{{ isset($settings['combo_4']) ? asset('storage/' . $settings['combo_4']) : asset('assets/images/combo-4.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            <!-- Combo Tuyết Trang -->
            <div class="bg-gradient-to-b from-mordan-lightgold to-[#e6d0a8] p-5 pt-6 flex flex-col items-center group cursor-pointer shadow-[0_10px_30px_rgba(0,0,0,0.3)] hover:-translate-y-2 transition-transform duration-500 border border-mordan-gold/30">
                <div class="text-center mb-4">
                    <h4 class="font-title text-mordan-darkred text-xs uppercase tracking-widest font-semibold">COMBO</h4>
                    <h3 class="font-title text-mordan-darkred text-2xl font-bold mt-[-2px]">Tuyết Trang</h3>
                </div>
                <div class="w-full aspect-[3/4] overflow-hidden mt-auto bg-stone-200 rounded-sm shadow-inner">
                    <img src="{{ isset($settings['combo_6']) ? asset('storage/' . $settings['combo_6']) : asset('assets/images/combo-6.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>

            <!-- Combo Tuệ Linh -->
            <div class="bg-gradient-to-b from-mordan-lightgold to-[#e6d0a8] p-5 pt-6 flex flex-col items-center group cursor-pointer shadow-[0_10px_30px_rgba(0,0,0,0.3)] hover:-translate-y-2 transition-transform duration-500 border border-mordan-gold/30">
                <div class="text-center mb-4">
                    <h4 class="font-title text-mordan-darkred text-xs uppercase tracking-widest font-semibold">COMBO</h4>
                    <h3 class="font-title text-mordan-darkred text-2xl font-bold mt-[-2px]">Tuệ Linh</h3>
                </div>
                <div class="w-full aspect-[3/4] overflow-hidden mt-auto bg-stone-200 rounded-sm shadow-inner">
                    <img src="{{ isset($settings['combo_9']) ? asset('storage/' . $settings['combo_9']) : asset('assets/images/combo-9.jpg') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center space-y-6 md:space-y-8">
            <div class="flex flex-col sm:flex-row items-center gap-4 sm:gap-6">
                <span class="font-title text-mordan-gold text-2xl md:text-3xl tracking-widest uppercase font-semibold">LIÊN HỆ HOTLINE:</span>
                <div class="border-2 border-mordan-gold px-6 py-2 md:px-10 md:py-3 rounded-sm shadow-[0_0_15px_rgba(197,160,89,0.15)] bg-mordan-darkred/50 backdrop-blur-sm">
                    <span class="font-title text-mordan-lightgold text-3xl md:text-4xl font-bold tracking-widest">0886 734 548</span>
                </div>
            </div>
            <a href="#" class="border-2 border-mordan-gold px-6 py-4 md:px-16 md:py-5 rounded-sm shadow-[0_0_20px_rgba(197,160,89,0.2)] hover:bg-mordan-gold group transition-all duration-300 inline-block bg-transparent"><span class="font-title text-mordan-gold group-hover:text-mordan-darkred text-lg md:text-2xl font-bold tracking-widest uppercase transition-colors">CATALOG + CHÍNH SÁCH CHIẾT KHẤU</span></a>
        </div>
    </div>
</section>

<!-- 7. KHÁCH HÀNG NÓI VỀ DE LUNE (Testimonials) -->
<section class="py-24 bg-mordan-cream relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 space-y-4 text-stone-800">
            <h2 class="font-title text-4xl md:text-5xl font-bold text-stone-800">Khách hàng nói về <span class="italic text-mordan-red font-normal">De Lune Bakery</span></h2>
            <p class="text-stone-500 max-w-2xl mx-auto text-sm md:text-base leading-relaxed">De Lune Bakery trân trọng cảm ơn quý khách hàng đã luôn tin tưởng ủng hộ và đồng hành cùng chúng tôi trong suốt thời gian qua.</p>
            <div class="w-24 h-[2px] bg-mordan-gold mx-auto mt-6"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-20 max-w-5xl mx-auto">
            <!-- Khách hàng 1 -->
            <div class="flex flex-col sm:flex-row gap-6 items-start">
                <img src="{{ isset($settings['testimonial_1_img']) ? asset('storage/' . $settings['testimonial_1_img']) : 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=200&auto=format&fit=crop' }}" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover shadow-lg border-2 border-mordan-gold/30 shrink-0">
                <div class="space-y-3">
                    <div class="flex items-center gap-4">
                        <h4 class="font-title text-xl font-bold text-mordan-darkred">{{ $settings['testimonial_1_name'] ?? 'Lê Na' }}</h4>
                        <div class="flex text-mordan-gold text-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                    </div>
                    <p class="text-stone-600 text-sm leading-relaxed text-justify">
                        {{ $settings['testimonial_1_content'] ?? 'Mấy năm gần đây năm nào tôi cũng chọn mua bánh trung thu De Lune để làm quà tặng tri ân khách hàng thân thiết. Khách nhận bánh đều rất thích và khen ngợi. Hộp bánh đẹp sang trọng, là sự kết hợp tuyệt vời giữa hương vị truyền thống và phong cách hiện đại.' }}
                    </p>
                </div>
            </div>

            <!-- Khách hàng 2 -->
            <div class="flex flex-col sm:flex-row gap-6 items-start">
                <img src="{{ isset($settings['testimonial_2_img']) ? asset('storage/' . $settings['testimonial_2_img']) : 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=200&auto=format&fit=crop' }}" class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover shadow-lg border-2 border-mordan-gold/30 shrink-0">
                <div class="space-y-3">
                    <div class="flex items-center gap-4">
                        <h4 class="font-title text-xl font-bold text-mordan-darkred">{{ $settings['testimonial_2_name'] ?? 'Mạnh Tú' }}</h4>
                        <div class="flex text-mordan-gold text-sm">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                        </div>
                    </div>
                    <p class="text-stone-600 text-sm leading-relaxed text-justify">
                        {{ $settings['testimonial_2_content'] ?? 'Tôi phụ trách tìm kiếm quà tặng đối tác cho doanh nghiệp. Sau khi tìm hiểu nhiều bên, tôi quyết định đặt số lượng lớn tại De Lune. Mẫu mã thiết kế cực kỳ sang trọng, chất lượng bánh đồng đều, chắc chắn chúng tôi sẽ tiếp tục hợp tác.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 8. NEWSLETTER SECTION -->
<section class="py-24 bg-mordan-lightgold relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-6 relative z-10">
        <svg class="w-12 h-12 text-mordan-red mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 19v-8.93a2 2 0 01.89-1.664l7-4.666a2 2 0 012.22 0l7 4.666A2 2 0 0121 10.07V19M3 19a2 2 0 002 2h14a2 2 0 002-2M3 19l6.75-4.5M21 19l-6.75-4.5M3 10l6.75 4.5M21 10l-6.75 4.5m0 0l-1.14.76a2 2 0 01-2.22 0l-1.14-.76"/></svg>
        <h2 class="font-title text-3xl md:text-4xl font-bold text-mordan-darkred">Đăng ký nhận ưu đãi đặc quyền</h2>
        <p class="text-mordan-red/80 text-sm md:text-base max-w-lg mx-auto">Trở thành người đầu tiên khám phá các vị bánh mới và nhận mã giảm giá <span class="font-bold text-mordan-red">10%</span> cho đơn hàng đầu tiên.</p>
        <form class="flex flex-col sm:flex-row max-w-lg mx-auto mt-10 gap-3">
            <input type="email" placeholder="Nhập địa chỉ email của bạn..." class="flex-1 px-6 py-4 rounded-sm border-2 border-white focus:outline-none focus:border-mordan-gold focus:ring-0 shadow-inner bg-white/80" required>
            <button type="submit" class="bg-mordan-darkred hover:bg-mordan-red text-white font-bold px-10 py-4 rounded-sm uppercase text-xs tracking-widest transition shadow-lg">Đăng Ký</button>
        </form>
    </div>
</section>

<!-- JavaScript Xử lý AJAX: Giỏ hàng kèm số lượng + Bộ lọc mượt mà -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentCategory = '{{ request('category', '') }}';
        let currentSort = '{{ request('sort', 'featured') }}';
        const searchQuery = '{{ request('search', '') }}';

        function fetchProducts(url) {
            const overlay = document.getElementById('loading-overlay');
            if(overlay) {
                overlay.classList.remove('opacity-0', 'pointer-events-none');
            }

            fetch(url, {
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                
                const newContainer = doc.getElementById('product-list-container');
                if(newContainer) {
                    document.getElementById('product-list-container').innerHTML = newContainer.innerHTML;
                }

                const newFilter = doc.getElementById('category-filters');
                if(newFilter) {
                    document.getElementById('category-filters').innerHTML = newFilter.innerHTML;
                }

                window.history.pushState({path: url}, '', url);
            })
            .catch(error => console.error('Lỗi khi tải dữ liệu:', error))
            .finally(() => {
                if(overlay) {
                    overlay.classList.add('opacity-0', 'pointer-events-none');
                }
            });
        }

        function buildUrlAndFetch() {
            const url = new URL(window.location.origin + window.location.pathname);
            if (currentCategory) url.searchParams.set('category', currentCategory);
            if (currentSort && currentSort !== 'featured') url.searchParams.set('sort', currentSort);
            if (searchQuery) url.searchParams.set('search', searchQuery);
            
            url.hash = 'collection';
            fetchProducts(url.toString());
        }

        document.addEventListener('click', function(e) {
            // --- Tăng giảm số lượng ---
            if (e.target.classList.contains('qty-dec')) {
                const container = e.target.closest('div');
                const input = container.querySelector('.product-qty');
                let val = parseInt(input.value) || 1;
                if (val > 1) input.value = val - 1;
                return;
            }

            if (e.target.classList.contains('qty-inc')) {
                const container = e.target.closest('div');
                const input = container.querySelector('.product-qty');
                let val = parseInt(input.value) || 1;
                input.value = val + 1;
                return;
            }

            // --- Lọc danh mục ---
            const filterBtn = e.target.closest('.filter-btn');
            if (filterBtn) {
                e.preventDefault();
                currentCategory = filterBtn.getAttribute('data-category');
                buildUrlAndFetch();
                return;
            }

            // --- Phân trang ---
            const pageLink = e.target.closest('#product-list-container nav a');
            if (pageLink) {
                e.preventDefault();
                fetchProducts(pageLink.href);
                return;
            }

            // --- Thêm vào giỏ (Kèm số lượng) ---
            const addToCartBtn = e.target.closest('.add-to-cart-btn');
            if (addToCartBtn) {
                e.preventDefault();
                const productId = addToCartBtn.getAttribute('data-id');
                
                const productCard = addToCartBtn.closest('.group');
                const qtyInput = productCard ? productCard.querySelector('.product-qty') : null;
                const quantity = qtyInput ? parseInt(qtyInput.value) || 1 : 1;

                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                
                const originalText = addToCartBtn.innerHTML;
                addToCartBtn.innerHTML = 'Đang thêm...';
                addToCartBtn.disabled = true;

                fetch('{{ route('cart.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ product_id: productId, quantity: quantity })
                })
                .then(response => response.json())
                .then(data => {
                    addToCartBtn.innerHTML = originalText;
                    addToCartBtn.disabled = false;

                    if(data.success) {
                        const cartCounter = document.getElementById('cart-counter');
                        if(cartCounter) cartCounter.innerText = data.cart_count;
                        showToast(data.message);
                    } else {
                        showToast("Lỗi: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Lỗi kết nối:', error);
                    addToCartBtn.innerHTML = originalText;
                    addToCartBtn.disabled = false;
                    showToast("Đã có lỗi xảy ra, thử lại sau!");
                });
            }
        });

        document.addEventListener('change', function(e) {
            if(e.target.id === 'sort-select') {
                currentSort = e.target.value;
                buildUrlAndFetch();
            }
        });
    });

    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-5 right-5 bg-mordan-gold text-mordan-darkred font-bold px-6 py-3 rounded shadow-2xl z-50 transform transition-all duration-500 translate-y-10 opacity-0 border border-mordan-darkred';
        toast.innerText = message;
        document.body.appendChild(toast);

        setTimeout(() => toast.classList.remove('translate-y-10', 'opacity-0'), 100);
        setTimeout(() => {
            toast.classList.add('translate-y-10', 'opacity-0');
            setTimeout(() => toast.remove(), 500);
        }, 3000);
    }
</script>
@endsection