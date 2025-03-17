<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('stylist_commissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stylist_id');
            $table->decimal('total_commission', 10, 2);
            $table->integer('completed_appointments');
            $table->timestamps();

            $table->foreign('stylist_id')->references('id')->on('stylists')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('stylist_commissions');
    }
};
