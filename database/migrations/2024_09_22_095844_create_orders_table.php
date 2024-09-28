<!-- <?php

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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 50);
            $table->string('phone', 15);
            $table->string('address', 199);
            $table->string('email', 199);
            $table->enum('payment' ,['Thanh toán khi nhận hàng' , 'Thanh toán bằng thẻ' , 'Thanh toán qua VNPay'])->default('Thanh toán khi nhận hàng');
            
            $table->enum('status' , ['Chờ xác nhận', 'Đã xác nhận' ,'Đang chuẩn bị hàng', 'Đang giao hàng', 'Đã giao hàng', 'Đơn hàng đã hủy'])->default('Chờ xác nhận');
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
?>
