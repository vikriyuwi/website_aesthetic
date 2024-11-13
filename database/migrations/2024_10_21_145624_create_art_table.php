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
        Schema::create('ART', function (Blueprint $table) {
            $table->id('ART_ID');
            $table->unsignedBigInteger('ARTIST_ID');
            $table->foreign('ARTIST_ID')->references('ARTIST_ID')->on('ARTIST');
            $table->string('ART_TITLE');
            $table->text('DESCRIPTION');
            $table->integer('VIEW');
            $table->boolean('IS_SALE');
            $table->decimal('PRICE', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ART');
    }
};
