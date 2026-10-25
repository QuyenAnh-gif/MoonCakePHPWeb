@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">

    <!-- Header & Nút Quay lại -->
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.categories.index') }}" class="p-2 bg-white border border-slate-200 rounded-lg text-slate-500 hover:bg-slate-50 transition shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Sửa Danh Mục: {{ $category->name }}</h1>
            <p class="text-slate-500 text-xs mt-1">Cập nhật thông tin phân loại</p>
        </div>
    </div>

    <!-- Form Chỉnh sửa -->
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 md:p-8">
        @csrf
        @method('PUT')

        <div class="space-y-6">
            <!-- Tên danh mục -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Tên danh mục <span class="text-rose-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" required class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 focus:bg-white transition">
                @error('name') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>

            <!-- Mô tả danh mục -->
            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Mô tả (Tùy chọn)</label>
                <textarea name="description" rows="4" class="w-full text-sm bg-slate-50 border border-slate-200 px-4 py-3 rounded-lg focus:outline-none focus:border-amber-400 focus:bg-white transition">{{ old('description', $category->description) }}</textarea>
                @error('description') <span class="text-xs text-rose-500 font-medium mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 text-sm font-bold text-slate-500 hover:text-slate-800 transition">Hủy bỏ</a>
            <button type="submit" class="px-8 py-3 bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold rounded-lg text-sm shadow-sm transition">
                Cập Nhật Danh Mục
            </button>
        </div>
    </form>
</div>
@endsection