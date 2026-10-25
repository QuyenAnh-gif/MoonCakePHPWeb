@extends('layouts.admin')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Quản lý Danh mục</h1>
            <p class="text-slate-500 text-xs mt-1">Quản lý các loại bánh và combo</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-400 hover:bg-amber-500 text-slate-900 font-bold rounded-lg text-sm transition shadow-sm">
            Thêm Danh Mục
        </a>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-slate-200 text-xs uppercase tracking-wider text-slate-500 font-bold">
                    <th class="p-4 w-20 text-center">ID</th>
                    <th class="p-4">Tên danh mục</th>
                    <th class="p-4">Đường dẫn (Slug)</th>
                    <th class="p-4 text-center">Số sản phẩm</th>
                    <th class="p-4 text-center w-32">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                @foreach($categories as $category)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 text-center font-medium text-slate-500">#{{ $category->id }}</td>
                        <td class="p-4 font-bold text-slate-800">{{ $category->name }}</td>
                        <td class="p-4 text-slate-500">{{ $category->slug }}</td>
                        <td class="p-4 text-center font-bold text-mordan-red">{{ $category->products_count ?? 0 }}</td>
                        <td class="p-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="p-1.5 text-sky-600 bg-sky-50 hover:bg-sky-100 rounded transition" title="Sửa">Sửa</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Xóa danh mục này?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-1.5 text-rose-600 bg-rose-50 hover:bg-rose-100 rounded transition">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection