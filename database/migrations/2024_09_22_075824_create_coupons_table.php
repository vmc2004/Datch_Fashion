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
            $table->double('discount', 10, 2); // số tiền hoặc số % giảm giá
            $table->enum('discount_type', ['fixed', 'percent']); // Loại giảm giá
            $table->integer('usage_limit')->nullable(); // Giới hạn sử dụng toàn hệ thống
            $table->unsignedInteger('usage_limit_per_user')->nullable(); // Giới hạn sử dụng mỗi người dùng
            $table->integer('used_count')->default(0)->nullable(); // Số lần đã sử dụng
            $table->unsignedBigInteger('minimum_amount')->nullable(); // Tổng tiền tối thiểu
            $table->unsignedBigInteger('maximum_amount')->nullable(); // Tổng tiền tối đa
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
