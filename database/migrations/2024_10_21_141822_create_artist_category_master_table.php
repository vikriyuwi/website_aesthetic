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
        Schema::create('ARTIST_CATEGORY_MASTER', function (Blueprint $table) {
            $table->id('ARTIST_CATEGORY_MASTER_ID');
            $table->string('ARTIST_CATEGORY_NAME');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ARTIST_CATEGORY_MASTER');
    }
};
