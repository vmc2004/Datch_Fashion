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
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('display_name')->nullable(); // Cột display_name
            $table->string('group')->nullable(); // Cột group
        });

        // Thêm cột vào bảng roles
        Schema::table('roles', function (Blueprint $table) {
            $table->string('display_name')->nullable(); // Cột display_name
            $table->string('group')->nullable(); // Cột group
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permissions_and_roles_tables', function (Blueprint $table) {
            //
        });
    }
};
