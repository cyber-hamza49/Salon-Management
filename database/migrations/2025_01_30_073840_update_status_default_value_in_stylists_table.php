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
        Schema::table('stylists', function (Blueprint $table) {
            $table->boolean('status')->default(1)->change(); // Default 1 set kar diya
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stylists', function (Blueprint $table) {
            $table->boolean('status')->default(0)->change(); // Wapas default 0 kar diya
        });
    }
};