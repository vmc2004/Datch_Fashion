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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // mã giảm giá
            $table->decimal('discount', 10, 2); // số tiền hoặc số % giảm giá
            $table->enum('discount_type', ['fixed', 'percent']); // Loại giảm giá
            $table->integer('usage_limit')->nullable(); // Giới hạn sử dụng
            $table->integer('used_count')->default(0); // Số lần đã sử dụng
            $table->dateTime('start_date')->nullable(); // Ngày bắt đầu
            $table->dateTime('end_date')->nullable(); // Ngày kết thúc
            $table->boolean('is_active')->default(true); // Trạng thái hoạt động
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
