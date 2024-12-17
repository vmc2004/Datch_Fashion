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
            $table->string('code')->unique(); 
            $table->double('discount', 10, 2);
            $table->enum('discount_type', ['fixed', 'percent']);
            $table->integer('quantity')->nullable(); 
            $table->integer('used')->default(0)->nullable(); 
            $table->double('max_price')->nullable(); 
            $table->date('start_date')->nullable(); 
            $table->date('end_date')->nullable();
            $table->boolean('is_active')->default(true);
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
