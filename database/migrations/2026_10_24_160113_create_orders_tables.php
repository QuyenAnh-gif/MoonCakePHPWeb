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
    // Bảng lưu thông tin Đơn hàng chung
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Khách vãng lai hoặc có tài khoản
        $table->string('customer_name');
        $table->string('customer_email');
        $table->string('customer_phone');
        $table->string('customer_address');
        $table->text('notes')->nullable();
        $table->decimal('total_amount', 15, 2);
        $table->string('status')->default('pending'); // pending (chờ xử lý), completed (hoàn thành), cancelled (đã hủy)
        $table->timestamps();
    });

    // Bảng lưu Chi tiết từng món trong Đơn hàng
    Schema::create('order_items', function (Blueprint $table) {
        $table->id();
        $table->foreignId('order_id')->constrained()->onDelete('cascade');
        $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');
        $table->string('product_name');
        $table->decimal('price', 15, 2);
        $table->integer('quantity');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_tables');
    }
};
