<?php

use App\Http\Controllers\CheckoutController;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;

// --- TRANG CHỦ ---
Route::get('/', function (Request $request) {
    // 1. Lấy danh sách danh mục (LOẠI TRỪ danh mục Hộp quà)
    // Giả sử slug của hộp quà là 'hop-qua-cao-cap' như trong Seeder
    $categories = Category::where('slug', '!=', 'hop-qua-cao-cap')->get();

    // 2. Khởi tạo truy vấn sản phẩm (CHỈ LẤY SẢN PHẨM KHÔNG PHẢI HỘP QUÀ)
    $query = Product::with('category')->whereHas('category', function($q) {
        $q->where('slug', '!=', 'hop-qua-cao-cap');
    });

    // 3. Xử lý Lọc theo Nút Danh Mục
    if ($request->has('category') && $request->category != '') {
        $query->where('category_id', $request->category);
    }

    // 4. Xử lý Tìm kiếm
    if ($request->has('search') && $request->search != '') {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 5. Xử lý Sắp xếp (Giá thấp -> cao, Cao -> thấp, Nổi bật)
    if ($request->has('sort')) {
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc'); // Giá thấp đến cao
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc'); // Giá cao đến thấp
        } else {
            $query->latest(); // Nổi bật / Mới nhất
        }
    } else {
        $query->latest(); // Mặc định là Nổi bật
    }

    $products = $query->paginate(8)->withQueryString();
    
    // Lấy cấu hình giao diện trang chủ
    $settings = Setting::pluck('value', 'key')->toArray();
    
    return view('welcome', compact('products', 'settings', 'categories'));
})->name('home');

// --- TRANG GIỚI THIỆU ---
Route::get('/gioi-thieu', function () {
    $settings = Setting::pluck('value', 'key')->toArray();
    return view('about', compact('settings'));
})->name('about');

// --- ĐĂNG NHẬP / ĐĂNG XUẤT ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// --- ĐĂNG KÝ (REGISTER) ---
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// --- TRANG QUẢN TRỊ ADMIN ---
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    
    // Quản lý Giao diện
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});

// Thêm Route AJAX Giỏ hàng
Route::post('/cart/add', [CartController::class, 'addAjax'])->name('cart.add');

// --- GIỎ HÀNG & THANH TOÁN ---
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');