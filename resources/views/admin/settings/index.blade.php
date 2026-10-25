@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-8">
    
    <!-- Tiêu đề trang -->
    <div>
        <h1 class="text-2xl font-bold text-slate-800">Bảng điều khiển & Cấu hình Website</h1>
        <p class="text-slate-500 text-xs mt-1">Quản lý giao diện, hình ảnh, video và nội dung các trang</p>
    </div>

    <!-- 4 THẺ THỐNG KÊ NHANH (Cards giống ảnh mẫu) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Card 1 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
            </div>
            <div>
                <h4 class="text-xs uppercase font-bold text-slate-400">Cấu hình</h4>
                <p class="text-sm font-bold text-slate-800 mt-0.5">Trang chủ & About</p>
                <span class="text-[11px] text-amber-600 font-medium">Hoạt động tốt</span>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <div>
                <h4 class="text-xs uppercase font-bold text-slate-400">Tài khoản</h4>
                <p class="text-sm font-bold text-slate-800 mt-0.5">{{ auth()->user()->name ?? 'Admin' }}</p>
                <span class="text-[11px] text-emerald-600 font-medium">Quyền Quản trị</span>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <div>
                <h4 class="text-xs uppercase font-bold text-slate-400">Bảo mật</h4>
                <p class="text-sm font-bold text-slate-800 mt-0.5">Xác thực 2 Role</p>
                <span class="text-[11px] text-sky-600 font-medium">Bảo vệ Middleware</span>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-5 rounded-xl border border-slate-200 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h4 class="text-xs uppercase font-bold text-slate-400">Trực tuyến</h4>
                <p class="text-sm font-bold text-slate-800 mt-0.5">1 Người online</p>
                <span class="text-[11px] text-indigo-600 font-medium">Đang quản trị</span>
            </div>
        </div>
    </div>

    <!-- FORM QUẢN TRỊ NỘI DUNG -->
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <!-- ======================= KHU VỰC TRANG CHỦ ======================= -->
        <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-8 space-y-6">
            <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-800 uppercase tracking-wide">1. Thiết Lập Trang Chủ (Homepage)</h2>
                    <p class="text-xs text-slate-400 mt-0.5">Tải video hero, banner và các ảnh bộ sưu tập</p>
                </div>
                <span class="px-2.5 py-1 text-xs rounded-full bg-slate-100 text-slate-600 font-medium">De Lune Core</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Hero Video -->
                <div class="md:col-span-2 bg-slate-50 p-5 rounded-lg border border-slate-200">
                    <label class="block font-bold text-xs uppercase text-slate-700 mb-2">Video Mở Màn (Hero Video)</label>
                    <input type="file" name="hero_video" accept="video/mp4" class="w-full text-xs bg-white border border-slate-200 p-2 rounded">
                    @if(isset($settings['hero_video']))
                        <p class="text-xs text-emerald-600 font-semibold mt-2 flex items-center gap-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            Đã có video tùy chỉnh lưu trên máy chủ
                        </p>
                    @endif
                </div>

                <!-- Brand Story -->
                <div>
                    <label class="block font-bold text-xs uppercase text-slate-700 mb-2">Ảnh Câu chuyện 30 Năm</label>
                    <input type="file" name="brand_story" accept="image/*" class="w-full text-xs bg-white border border-slate-200 p-2 rounded">
                    @if(isset($settings['brand_story']))
                        <img src="{{ asset('storage/' . $settings['brand_story']) }}" class="mt-2 h-16 rounded border border-slate-200 object-cover">
                    @endif
                </div>

                <!-- Banner Doanh nghiệp -->
                <div>
                    <label class="block font-bold text-xs uppercase text-slate-700 mb-2">Ảnh Nền Banner Doanh Nghiệp</label>
                    <input type="file" name="banner_bg" accept="image/*" class="w-full text-xs bg-white border border-slate-200 p-2 rounded">
                    @if(isset($settings['banner_bg']))
                        <img src="{{ asset('storage/' . $settings['banner_bg']) }}" class="mt-2 h-16 rounded border border-slate-200 object-cover">
                    @endif
                </div>

                <!-- Section Video Dọc -->
                <div class="md:col-span-2 bg-slate-50 p-5 rounded-lg border border-slate-200 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold text-xs uppercase text-slate-700 mb-2">Ảnh nền Section Video Dọc</label>
                        <input type="file" name="vertical_bg" accept="image/*" class="w-full text-xs bg-white border border-slate-200 p-2 rounded">
                        @if(isset($settings['vertical_bg']))
                            <img src="{{ asset('storage/' . $settings['vertical_bg']) }}" class="mt-2 h-16 rounded border border-slate-200 object-cover">
                        @endif
                    </div>
                    <div>
                        <label class="block font-bold text-xs uppercase text-slate-700 mb-2">Video Cột Dọc</label>
                        <input type="file" name="vertical_video" accept="video/mp4" class="w-full text-xs bg-white border border-slate-200 p-2 rounded">
                        @if(isset($settings['vertical_video']))
                            <span class="text-xs text-emerald-600 font-bold block mt-2">✓ Đã tải video</span>
                        @endif
                    </div>
                    <div>
                        <label class="block font-bold text-xs uppercase text-slate-700 mb-2">Ảnh Bìa Cột Dọc</label>
                        <input type="file" name="vertical_cover" accept="image/*" class="w-full text-xs bg-white border border-slate-200 p-2 rounded">
                        @if(isset($settings['vertical_cover']))
                            <img src="{{ asset('storage/' . $settings['vertical_cover']) }}" class="mt-2 h-16 rounded border border-slate-200 object-cover">
                        @endif
                    </div>
                </div>

                <!-- 4 Mẫu Hộp Quà Doanh Nghiệp -->
                <div class="md:col-span-2 border-t border-slate-100 pt-4">
                    <h3 class="text-sm font-bold text-slate-800 mb-3 uppercase">Hộp Quà Doanh Nghiệp</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Set Bách Diệp Thu Yến</label>
                            <input type="file" name="set_tu_quy" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['set_tu_quy'])) <img src="{{ asset('storage/' . $settings['set_tu_quy']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Set Song Lân Khai Phúc</label>
                            <input type="file" name="set_luc_bao" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['set_luc_bao'])) <img src="{{ asset('storage/' . $settings['set_luc_bao']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 mb-1">Set Diệu Nguyệt Trung Thu</label>
                            <input type="file" name="set_phu_quy" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['set_phu_quy'])) <img src="{{ asset('storage/' . $settings['set_phu_quy']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-amber-700 mb-1">Mẫu Hộp Mới (Set 4)</label>
                            <input type="file" name="set_4" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['set_4'])) <img src="{{ asset('storage/' . $settings['set_4']) }}" class="mt-2 h-14 rounded object-cover border border-amber-300"> @endif
                        </div>
                    </div>
                </div>

                <!-- Section Combo -->
                <div class="md:col-span-2 border-t border-slate-100 pt-4">
                    <h3 class="text-sm font-bold text-slate-800 mb-3 uppercase">Bộ Sưu Tập Combo 2026</h3>
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-slate-600 mb-1">Hình Nền Section Combo</label>
                        <input type="file" name="combo_bg" accept="image/*" class="w-full text-xs">
                        @if(isset($settings['combo_bg'])) <img src="{{ asset('storage/' . $settings['combo_bg']) }}" class="mt-2 h-16 rounded object-cover"> @endif
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Combo Bạch Nguyệt</label>
                            <input type="file" name="combo_2" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['combo_2'])) <img src="{{ asset('storage/' . $settings['combo_2']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Combo Lụa Mây</label>
                            <input type="file" name="combo_4" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['combo_4'])) <img src="{{ asset('storage/' . $settings['combo_4']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Combo Tuyết Trang</label>
                            <input type="file" name="combo_6" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['combo_6'])) <img src="{{ asset('storage/' . $settings['combo_6']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-600 mb-1">Combo Tuệ Linh</label>
                            <input type="file" name="combo_9" accept="image/*" class="w-full text-xs">
                            @if(isset($settings['combo_9'])) <img src="{{ asset('storage/' . $settings['combo_9']) }}" class="mt-2 h-14 rounded object-cover"> @endif
                        </div>
                    </div>
                </div>

                <!-- Testimonials -->
                <div class="md:col-span-2 border-t border-slate-100 pt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <h4 class="text-xs font-bold uppercase text-slate-700 mb-2">Đánh giá khách hàng 1</h4>
                        <input type="file" name="testimonial_1_img" accept="image/*" class="w-full text-xs mb-2">
                        <input type="text" name="testimonial_1_name" value="{{ $settings['testimonial_1_name'] ?? 'Lê Na' }}" class="w-full text-xs p-2 border border-slate-200 rounded mb-2" placeholder="Tên khách hàng">
                        <textarea name="testimonial_1_content" rows="3" class="w-full text-xs p-2 border border-slate-200 rounded" placeholder="Nội dung">{{ $settings['testimonial_1_content'] ?? '' }}</textarea>
                    </div>

                    <div class="p-4 bg-slate-50 rounded-lg border border-slate-200">
                        <h4 class="text-xs font-bold uppercase text-slate-700 mb-2">Đánh giá khách hàng 2</h4>
                        <input type="file" name="testimonial_2_img" accept="image/*" class="w-full text-xs mb-2">
                        <input type="text" name="testimonial_2_name" value="{{ $settings['testimonial_2_name'] ?? 'Mạnh Tú' }}" class="w-full text-xs p-2 border border-slate-200 rounded mb-2" placeholder="Tên khách hàng">
                        <textarea name="testimonial_2_content" rows="3" class="w-full text-xs p-2 border border-slate-200 rounded" placeholder="Nội dung">{{ $settings['testimonial_2_content'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======================= KHU VỰC TRANG GIỚI THIỆU ======================= -->
        <div id="about-settings" class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-8 space-y-6">
            <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-base font-bold text-slate-800 uppercase tracking-wide">2. Thiết Lập Trang Giới Thiệu (About Us)</h2>
                    <p class="text-xs text-slate-400 mt-0.5">3 Khối ảnh và nội dung đan xen zic-zắc</p>
                </div>
                <a href="{{ route('about') }}" target="_blank" class="text-xs text-amber-600 font-bold hover:underline">Xem trang &rarr;</a>
            </div>

            <!-- Khối 1 -->
            <div class="p-4 bg-slate-50 rounded-lg border border-slate-200 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Ảnh Khối 1</label>
                    <input type="file" name="about_img_1" accept="image/*" class="w-full text-xs">
                    @if(isset($settings['about_img_1'])) <img src="{{ asset('storage/' . $settings['about_img_1']) }}" class="mt-2 h-16 rounded object-cover"> @endif
                </div>
                <div class="md:col-span-2 space-y-2">
                    <input type="text" name="about_title_1" value="{{ $settings['about_title_1'] ?? 'GIỚI THIỆU DE LUNE BAKERY' }}" class="w-full text-xs p-2 border border-slate-200 rounded font-bold" placeholder="Tiêu đề khối 1">
                    <textarea name="about_content_1" rows="3" class="w-full text-xs p-2 border border-slate-200 rounded" placeholder="Nội dung">{{ $settings['about_content_1'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- Khối 2 -->
            <div class="p-4 bg-slate-50 rounded-lg border border-slate-200 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Ảnh Khối 2</label>
                    <input type="file" name="about_img_2" accept="image/*" class="w-full text-xs">
                    @if(isset($settings['about_img_2'])) <img src="{{ asset('storage/' . $settings['about_img_2']) }}" class="mt-2 h-16 rounded object-cover"> @endif
                </div>
                <div class="md:col-span-2 space-y-2">
                    <input type="text" name="about_title_2" value="{{ $settings['about_title_2'] ?? 'QUÀ TẶNG DE LUNE BAKERY' }}" class="w-full text-xs p-2 border border-slate-200 rounded font-bold" placeholder="Tiêu đề khối 2">
                    <textarea name="about_content_2" rows="3" class="w-full text-xs p-2 border border-slate-200 rounded" placeholder="Nội dung">{{ $settings['about_content_2'] ?? '' }}</textarea>
                </div>
            </div>

            <!-- Khối 3 -->
            <div class="p-4 bg-slate-50 rounded-lg border border-slate-200 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Ảnh Khối 3</label>
                    <input type="file" name="about_img_3" accept="image/*" class="w-full text-xs">
                    @if(isset($settings['about_img_3'])) <img src="{{ asset('storage/' . $settings['about_img_3']) }}" class="mt-2 h-16 rounded object-cover"> @endif
                </div>
                <div class="md:col-span-2 space-y-2">
                    <input type="text" name="about_title_3" value="{{ $settings['about_title_3'] ?? 'TẦM NHÌN & SỨ MỆNH' }}" class="w-full text-xs p-2 border border-slate-200 rounded font-bold" placeholder="Tiêu đề khối 3">
                    <textarea name="about_content_3" rows="3" class="w-full text-xs p-2 border border-slate-200 rounded" placeholder="Nội dung">{{ $settings['about_content_3'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Nút lưu cố định dưới cùng -->
        <div class="text-right">
            <button type="submit" class="px-8 py-3 bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold rounded-lg text-sm transition shadow-sm">
                Lưu Thay Đổi Hệ Thống
            </button>
        </div>
    </form>
</div>
@endsection