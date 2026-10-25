@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="text-center mb-12">
        <h1 class="font-title text-4xl font-bold text-stone-800">Thông Tin Thanh Toán</h1>
        <div class="w-20 h-[2px] bg-mordan-gold mx-auto mt-4"></div>
    </div>

    <div class="flex flex-col lg:flex-row gap-10">
        <!-- Form thông tin -->
        <div class="lg:w-2/3 bg-white p-8 rounded-xl shadow-sm border border-stone-200">
            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-xs font-bold text-stone-700 uppercase mb-2">Họ và Tên *</label>
                        <input type="text" name="customer_name" value="{{ auth()->check() ? auth()->user()->name : old('customer_name') }}" required class="w-full text-sm bg-stone-50 border border-stone-200 px-4 py-3 rounded-md focus:border-mordan-gold focus:ring-0">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-stone-700 uppercase mb-2">Số Điện Thoại *</label>
                        <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required class="w-full text-sm bg-stone-50 border border-stone-200 px-4 py-3 rounded-md focus:border-mordan-gold focus:ring-0">
                    </div>
                </div>
                <div class="mb-6">
                    <label class="block text-xs font-bold text-stone-700 uppercase mb-2">Email *</label>
                    <input type="email" name="customer_email" value="{{ auth()->check() ? auth()->user()->email : old('customer_email') }}" required class="w-full text-sm bg-stone-50 border border-stone-200 px-4 py-3 rounded-md focus:border-mordan-gold focus:ring-0">
                </div>
                <div class="mb-6">
                    <label class="block text-xs font-bold text-stone-700 uppercase mb-2">Địa chỉ giao hàng *</label>
                    <input type="text" name="customer_address" value="{{ old('customer_address') }}" required class="w-full text-sm bg-stone-50 border border-stone-200 px-4 py-3 rounded-md focus:border-mordan-gold focus:ring-0">
                </div>
                <div class="mb-8">
                    <label class="block text-xs font-bold text-stone-700 uppercase mb-2">Ghi chú đơn hàng (Tùy chọn)</label>
                    <textarea name="notes" rows="3" class="w-full text-sm bg-stone-50 border border-stone-200 px-4 py-3 rounded-md focus:border-mordan-gold focus:ring-0" placeholder="Giao giờ hành chính, ghi lời chúc..."></textarea>
                </div>
            </form>
        </div>

        <!-- Khung tóm tắt đơn hàng -->
        <div class="lg:w-1/3">
            <div class="bg-mordan-cream p-6 rounded-xl border border-mordan-gold/30 shadow-lg sticky top-28">
                <h3 class="font-title text-xl font-bold text-mordan-darkred mb-6 border-b border-mordan-gold/20 pb-4">Tóm Tắt Đơn Hàng</h3>
                <div class="space-y-4 mb-6">
                    @php $total = 0; @endphp
                    @foreach($cart as $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-stone-600 font-medium line-clamp-1 pr-4">{{ $details['name'] }} <span class="font-bold text-mordan-darkred">x{{ $details['quantity'] }}</span></span>
                            <span class="font-bold text-stone-800 whitespace-nowrap">{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}đ</span>
                        </div>
                    @endforeach
                </div>
                <div class="border-t border-mordan-gold/20 pt-4 mb-8 flex justify-between items-center">
                    <span class="text-sm font-bold uppercase tracking-wider text-stone-600">Tổng cộng</span>
                    <span class="text-2xl font-bold text-mordan-red">{{ number_format($total, 0, ',', '.') }}đ</span>
                </div>
                <button onclick="document.getElementById('checkout-form').submit();" class="w-full bg-mordan-darkred hover:bg-mordan-gold text-white font-bold py-4 rounded-sm uppercase text-sm tracking-widest transition shadow-md">
                    Hoàn Tất Đặt Hàng
                </button>
            </div>
        </div>
    </div>
</div>
@endsection