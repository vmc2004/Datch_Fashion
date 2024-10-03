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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 199);
            $table->string('avatar', 255)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->boolean('status');
            $table->enum('role',['admin','member'])->default('member');
=======
            $table->enum('role',['member','admin'])->default('member');
            $table->boolean('status')->default(true);
            $table->rememberToken();
>>>>>>> 180afdd61f0aa4d7c2a248120a3bafb747a2d451
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
