@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.products.index') }}" class="p-2 bg-white border border-slate-200 rounded-lg text-slate-500 hover:bg-slate-50 transition shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Thêm Sản Phẩm Mới</h1>
            <p class="text-slate-500 text-xs mt-1">Điền thông tin chi tiết cho bánh hoặc hộp quà</p>
        </div>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-8">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Tên sản phẩm -->
            <div class="md:col-span-2">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Tên sản phẩm <span class="text-rose-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 focus:bg-white transition" placeholder="VD: Bánh nướng thập cẩm xá xíu...">
                @error('name') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Giá bán -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Giá bán (VNĐ) <span class="text-rose-500">*</span></label>
                <input type="number" name="price" value="{{ old('price') }}" required min="0" class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 focus:bg-white transition" placeholder="VD: 150000">
                @error('price') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Danh mục -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Danh mục <span class="text-rose-500">*</span></label>
                <select name="category_id" required class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 focus:bg-white transition">
                    <option value="">-- Chọn danh mục --</option>
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
                @error('category_id') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Hình ảnh -->
            <div class="md:col-span-2">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Hình ảnh sản phẩm</label>
                <input type="file" name="image" accept="image/*" class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 transition cursor-pointer">
                @error('image') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Mô tả -->
            <div class="md:col-span-2">
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Mô tả sản phẩm</label>
                <textarea name="description" rows="5" class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 focus:bg-white transition" placeholder="Thành phần, trọng lượng, hạn sử dụng...">{{ old('description') }}</textarea>
                @error('description') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-800 transition">Hủy bỏ</a>
            <button type="submit" class="px-8 py-3 bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold rounded-lg text-sm shadow-sm transition">
                Lưu Sản Phẩm Mới
            </button>
        </div>
    </form>
</div>
@endsection