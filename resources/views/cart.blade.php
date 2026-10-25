@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="font-title text-4xl font-bold text-stone-800">Giỏ Hàng Của Bạn</h1>
        <div class="w-20 h-[2px] bg-mordan-gold mx-auto mt-4"></div>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="bg-white rounded-xl shadow-sm border border-stone-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-stone-50 border-b border-stone-200 text-xs uppercase tracking-wider text-stone-500 font-bold">
                        <th class="p-4 w-24 text-center">Hình ảnh</th>
                        <th class="p-4">Sản phẩm</th>
                        <th class="p-4 text-center">Đơn giá</th>
                        <th class="p-4 text-center">Số lượng</th>
                        <th class="p-4 text-center">Thành tiền</th>
                        <th class="p-4 text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-100">
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td class="p-4"><img src="{{ asset('storage/' . $details['image']) }}" class="w-16 h-16 object-cover rounded-md shadow-sm mx-auto"></td>
                            <td class="p-4 font-bold text-stone-800">{{ $details['name'] }}</td>
                            <td class="p-4 text-center font-medium text-stone-600">{{ number_format($details['price'], 0, ',', '.') }}đ</td>
                            <td class="p-4 text-center font-bold">{{ $details['quantity'] }}</td>
                            <td class="p-4 text-center font-bold text-mordan-red">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}đ</td>
                            <td class="p-4 text-center">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-stone-400 hover:text-rose-500 transition"><svg class="w-5 h-5 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="bg-stone-50 p-6 border-t border-stone-200 flex flex-col md:flex-row justify-between items-center gap-4">
                <a href="{{ route('home') }}" class="text-sm font-bold text-stone-500 hover:text-mordan-red transition">&larr; Tiếp tục mua sắm</a>
                <div class="flex items-center gap-6">
                    <span class="text-lg font-bold text-stone-800">Tổng cộng: <span class="text-2xl text-mordan-red">{{ number_format($total, 0, ',', '.') }}đ</span></span>
                    <a href="{{ route('checkout.index') }}" class="bg-mordan-gold hover:bg-mordan-darkred text-white font-bold px-8 py-3.5 rounded-sm uppercase text-xs tracking-widest transition shadow-md">Thanh Toán</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-stone-200">
            <svg class="w-20 h-20 mx-auto text-stone-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            <p class="text-stone-500 font-medium mb-6">Giỏ hàng của bạn đang trống.</p>
            <a href="{{ route('home') }}" class="inline-block bg-mordan-darkred hover:bg-mordan-gold text-white font-bold px-8 py-3 rounded-sm uppercase text-xs tracking-widest transition">Xem Menu Bánh</a>
        </div>
    @endif
</div>
@endsection