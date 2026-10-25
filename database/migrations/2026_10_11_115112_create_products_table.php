<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Khóa ngoại liên kết bảng categories
        $table->string('name'); // Tên bánh
        $table->decimal('price', 12, 2); // Giá tiền
        $table->string('image')->nullable(); // Đường dẫn ảnh bánh (phục vụ tiêu chí Upload file)
        $table->text('description')->nullable(); // Chi tiết bánh
        $table->integer('stock')->default(100); // Số lượng tồn kho
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
