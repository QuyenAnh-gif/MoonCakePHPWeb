<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // 1. Hàm Thêm vào giỏ (AJAX)
    public function addAjax(Request $request)
    {
        $product = Product::find($request->product_id);
        
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại!']);
        }

        $quantity = max(1, (int) $request->input('quantity', 1));

        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        
        $cartCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true, 
            'cart_count' => $cartCount, 
            'message' => 'Đã thêm ' . $quantity . ' "' . $product->name . '" vào giỏ hàng!'
        ]);
    }
    // 2. Hiển thị trang Giỏ hàng (Đứng ĐỘC LẬP ngoài hàm addAjax)
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // 3. Xóa món khỏi giỏ hàng (Đứng ĐỘC LẬP ngoài hàm addAjax)
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
        }
    }
}