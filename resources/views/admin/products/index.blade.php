@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <!-- Header & Nút Thêm mới -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Quản lý Bánh & Combo</h1>
            <p class="text-slate-500 text-xs mt-1">Xem, thêm, sửa, xóa các loại bánh và hộp quà</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold rounded-lg text-sm transition shadow-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
            Thêm Sản Phẩm Mới
        </a>
    </div>

    <!-- Bảng dữ liệu -->
    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-bold">
                        <th class="p-4 w-20 text-center">ID</th>
                        <th class="p-4 w-24">Hình ảnh</th>
                        <th class="p-4">Tên sản phẩm</th>
                        <th class="p-4">Danh mục</th>
                        <th class="p-4">Giá bán (VNĐ)</th>
                        <th class="p-4 text-center w-32">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse($products as $product)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="p-4 text-center font-medium text-slate-500">#{{ $product->id }}</td>
                            <td class="p-4">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/80' }}" alt="{{ $product->name }}" class="w-12 h-12 rounded object-cover border border-slate-200 shadow-sm">
                            </td>
                            <td class="p-4 font-bold text-slate-800">{{ $product->name }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 text-[10px] uppercase tracking-wider font-bold rounded-full bg-indigo-50 text-indigo-600 border border-indigo-100">
                                    {{ $product->category->name ?? 'Chưa phân loại' }}
                               </span>
                            </td>
                            <td class="p-4 font-semibold text-rose-600">
                                {{ number_format($product->price, 0, ',', '.') }} đ
                            </td>
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Nút Sửa -->
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="p-1.5 text-sky-600 bg-sky-50 hover:bg-sky-100 rounded transition" title="Sửa">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                    </a>
                                    <!-- Nút Xóa -->
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 text-rose-600 bg-rose-50 hover:bg-rose-100 rounded transition" title="Xóa">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-8 text-center text-slate-500">Chưa có sản phẩm nào. Hãy thêm sản phẩm mới!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- Phân trang -->
        @if($products->hasPages())
            <div class="p-4 border-t border-slate-100 bg-slate-50">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection