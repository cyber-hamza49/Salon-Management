<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('stylists', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Stylist ka naam
            $table->text('description'); // Stylist ka description
            $table->decimal('commission_rate', 5, 2)->default(0); // Commission rate (e.g., percentage)
            $table->string('image'); // Image path ya URL
            $table->boolean('status')->default(0); // Status (active/inactive)
            $table->timestamps(); // Laravel ke default timestamps (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stylists');
    }
};
