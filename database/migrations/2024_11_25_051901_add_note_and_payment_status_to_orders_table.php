<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteAndPaymentStatusToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->text('note')->nullable()->after('status'); 
            $table->enum('payment_status' ,['Chưa thanh toán', 'Đã thanh toán' ])->after('note');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['note', 'payment_status']); // Xóa cột nếu rollback
        });
    }
}
