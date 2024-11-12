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
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->foreignId('cart_id')->constrained('carts'); // Khóa ngoại liên kết với bảng carts
            $table->foreignId('product_variant_id')->constrained('product_variants'); // Khóa ngoại liên kết với bảng product_variants
            $table->integer('quantity'); // Số lượng sản phẩm trong giỏ hàng
            $table->double('price'); // Giá của biến thể sản phẩm
            $table->timestamps(); // Timestamps
            $table->softDeletes(); // Soft deletes

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_details');
    }
};
