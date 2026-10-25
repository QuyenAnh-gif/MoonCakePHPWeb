<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }
        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('home');
        }

        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'required|email|max:255',
            'customer_address' => 'required|string',
        ]);

        $totalAmount = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        // 1. Tạo Đơn hàng mới
        $order = Order::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'notes' => $request->notes,
            'total_amount' => $totalAmount,
            'status' => 'pending'
        ]);

        // 2. Lưu chi tiết sản phẩm vào OrderItems
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'product_name' => $details['name'],
                'price' => $details['price'],
                'quantity' => $details['quantity'],
            ]);
        }

        // 3. Xóa giỏ hàng khỏi Session
        session()->forget('cart');

        return redirect()->route('checkout.success')->with('success', 'Đặt hàng thành công! Mã đơn hàng của bạn là #' . $order->id);
    }

    public function success()
    {
        return view('checkout_success');
    }
}