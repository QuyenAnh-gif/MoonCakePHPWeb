<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Tạo tài khoản mẫu (1 Admin, 1 User thường)
        User::updateOrCreate(['email' => 'admin@gmail.com'], [
            'name' => 'Nhà quản trị',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);

        User::updateOrCreate(['email' => 'user@gmail.com'], [
            'name' => 'Khách hàng',
            'password' => Hash::make('12345678'),
            'role' => 'user',
        ]);

        // 2. Tạo danh mục bánh mẫu
        $categories = [
            ['name' => 'Bánh Nướng Truyền Thống', 'slug' => 'banh-nuong-truyen-thong', 'description' => 'Hương vị tuổi thơ'],
            ['name' => 'Bánh Dẻo Hoàng Kim', 'slug' => 'banh-deo-hoang-kim', 'description' => 'Vỏ nếp thơm dẻo'],
            ['name' => 'Hộp Quà Cao Cấp', 'slug' => 'hop-qua-cao-cap', 'description' => 'Thích hợp biếu tặng doanh nghiệp'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        $catNuong = Category::where('slug', 'banh-nuong-truyen-thong')->first()->id;
        $catDeo = Category::where('slug', 'banh-deo-hoang-kim')->first()->id;
        $catHop = Category::where('slug', 'hop-qua-cao-cap')->first()->id;

        // 3. Tạo 8 sản phẩm mẫu
        $products = [
            ['category_id' => $catNuong, 'name' => 'Bánh Nướng Thập Cẩm Xá Xíu', 'price' => 150000, 'description' => 'Trọng lượng 150g. Nhân thập cẩm lạp xưởng xá xíu trứng muối.'],
            ['category_id' => $catNuong, 'name' => 'Bánh Nướng Hạt Sen Trà Xanh', 'price' => 135000, 'description' => 'Trọng lượng 150g. Vỏ nướng vàng ươm, nhân trà xanh thanh mát.'],
            ['category_id' => $catNuong, 'name' => 'Bánh Nướng Khoai Môn Hạt Macca', 'price' => 140000, 'description' => 'Trọng lượng 150g. Nhân khoai môn bùi béo kết hợp macca.'],
            ['category_id' => $catDeo, 'name' => 'Bánh Dẻo Đậu Xanh Lá Dứa', 'price' => 120000, 'description' => 'Trọng lượng 150g. Vỏ bánh dẻo trắng ngần, nhân đậu xanh lá dứa.'],
            ['category_id' => $catDeo, 'name' => 'Bánh Dẻo Sữa Dừa Hạt Dưa', 'price' => 125000, 'description' => 'Trọng lượng 150g. Ngọt ngào vị sữa dừa sợi.'],
            ['category_id' => $catHop, 'name' => 'Set Bách Diệp Thu Yến', 'price' => 850000, 'description' => 'Gồm 4 bánh nướng thượng hạng (150g) và 1 hộp trà Ô Long.'],
            ['category_id' => $catHop, 'name' => 'Set Song Lân Khai Phúc', 'price' => 1550000, 'description' => 'Gồm 6 bánh dập vàng lá 24K, kèm bình rượu vang đỏ.'],
            ['category_id' => $catHop, 'name' => 'Set Diệu Nguyệt', 'price' => 1200000, 'description' => 'Gồm 8 bánh nướng mini đa dạng hương vị, hộp gỗ khắc laser.'],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(['name' => $prod['name']], $prod);
        }
    }
}