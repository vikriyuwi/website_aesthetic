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
        Schema::create('ORDER', function (Blueprint $table) {
            $table->id('ORDER_ID');
            $table->unsignedBigInteger('USER_ID');
            $table->foreign('USER_ID')->references('USER_ID')->on('MASTER_USER')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ART_ID');
            $table->foreign('ART_ID')->references('ART_ID')->on('ART')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('QUANTITY');
            $table->integer('PRICE_PER_ITEM');
            $table->integer('STATUS')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ORDER');
    }
};
