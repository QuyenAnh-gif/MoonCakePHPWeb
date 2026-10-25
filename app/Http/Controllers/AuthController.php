<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLogin()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Tiêu chí 1: Validation Form
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Nếu là admin thì chuyển hướng vào trang quản trị
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin/products');
            }
            
            // Nếu là khách thì về trang chủ
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác.',
        ])->onlyInput('email');
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Kiểm tra dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' tự động so sánh với trường password_confirmation
        ], [
            'name.required' => 'Vui lòng nhập Họ và Tên.',
            'email.required' => 'Vui lòng nhập địa chỉ Email.',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.required' => 'Vui lòng nhập Mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        // 2. Tạo tài khoản mới (Mặc định role là 'user')
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'role' => 'user', 
        ]);

        // 3. Đăng nhập ngay lập tức sau khi đăng ký thành công
        \Illuminate\Support\Facades\Auth::login($user);

        // 4. Chuyển hướng về Trang chủ
        return redirect()->route('home')->with('success', 'Đăng ký tài khoản thành công! Chào mừng bạn đến với De Lune Bakery.');
    }
}