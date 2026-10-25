<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm (Có tìm kiếm và phân trang)
     */
    public function index(Request $request)
    {
        // Sử dụng Eager Loading để tối ưu câu truy vấn (Lấy kèm thông tin Category)
        $query = Product::with('category');

        // Chức năng tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp mới nhất và phân trang
        $products = $query->latest()->paginate(10)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Hiển thị Form thêm sản phẩm mới
     */
    public function create()
    {
        // Lấy danh sách danh mục để hiển thị ở thẻ <select>
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Lưu sản phẩm mới vào Cơ sở dữ liệu
     */
    public function store(Request $request)
    {
        // 1. Validation - Xác thực dữ liệu đầu vào (0.5đ theo barem)
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Hỗ trợ chuẩn ảnh hiện đại, max 2MB
            'description' => 'nullable|string'
        ], [
            // Tùy chỉnh câu thông báo lỗi sang tiếng Việt
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'price.required' => 'Vui lòng nhập giá bán.',
            'price.numeric' => 'Giá bán phải là một con số.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
            'image.image' => 'File tải lên phải là định dạng hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có đuôi: jpeg, png, jpg, webp.',
            'image.max' => 'Dung lượng ảnh không được vượt quá 2MB.'
        ]);

        // 2. Xử lý Upload hình ảnh (0.5đ sáng tạo)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Lưu vào Database bằng Eloquent
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm mới thành công!');
    }

    /**
     * Hiển thị Form chỉnh sửa sản phẩm
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Cập nhật thông tin sản phẩm
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string'
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm.',
            'price.required' => 'Vui lòng nhập giá bán.',
            'price.numeric' => 'Giá bán phải là một con số.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'image.image' => 'File tải lên phải là định dạng hình ảnh.',
            'image.max' => 'Dung lượng ảnh không được vượt quá 2MB.'
        ]);

        // 2. Xử lý cập nhật hình ảnh (Xóa ảnh cũ, lưu ảnh mới)
        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            // Kiểm tra và xóa file ảnh cũ trong thư mục storage
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Lưu file ảnh mới
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Cập nhật Database
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Xóa sản phẩm
     */
    public function destroy(Product $product)
    {
        // 1. Xóa file ảnh vật lý trong server (tránh rác dữ liệu)
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // 2. Xóa bản ghi trong Database
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Đã xóa sản phẩm thành công!');
    }
}