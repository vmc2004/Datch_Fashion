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
        // Kiểm tra xem bảng 'carts' đã tồn tại chưa
        if (!Schema::hasTable('carts')) {
            // Nếu bảng chưa tồn tại, tạo bảng 'carts'
            Schema::create('carts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('status')->default('active');
                $table->timestamps();
            });
        }

        // Kiểm tra xem cột 'code' đã tồn tại trong bảng 'orders' chưa
        if (!Schema::hasColumn('orders', 'code')) {
            // Nếu chưa có, thêm cột 'code' vào bảng 'orders'
            Schema::table('orders', function (Blueprint $table) {
                $table->string('code')->nullable(false);  // Cột 'code' không được rỗng
            });
        }

        // Kiểm tra xem ràng buộc UNIQUE đã được thêm vào cột 'code' chưa
        if (!Schema::hasIndex('orders', 'orders_code_unique')) {
            // Nếu chưa có, thêm ràng buộc UNIQUE cho cột 'code'
            Schema::table('orders', function (Blueprint $table) {
                $table->unique('code', 'orders_code_unique');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Xóa cột 'code' trong bảng 'orders' khi rollback migration
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('code');
        });

        // Xóa bảng 'carts' khi rollback migration
        Schema::dropIfExists('carts');
    }
};
