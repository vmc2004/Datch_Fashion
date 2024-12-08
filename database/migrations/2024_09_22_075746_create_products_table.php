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
            $table->string('code', 9)->unique();
            $table->string('name', 199);
            $table->string('slug', 255)->unique();
            $table->string('image', 255)->nullable();
            $table->double('price');
            $table->text('description')->nullable();
            $table->string('material')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('is_active')->default(true);
            $table->double('views')->default(0); 
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('brand_id')->constrained('brands');
            $table->softDeletes();
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
