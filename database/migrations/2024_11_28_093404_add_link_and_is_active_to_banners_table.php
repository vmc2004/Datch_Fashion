<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('link')->nullable()->after('image');
            $table->boolean('is_active')->default(true)->after('link');
        });
    }
    
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn(['link', 'is_active']); 
        });
    }
    
};
