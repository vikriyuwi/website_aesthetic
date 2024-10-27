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
        Schema::create('BUYER', function (Blueprint $table) {
            $table->id('BUYER_ID');
            $table->unsignedBigInteger('USER_ID');
            $table->foreign('USER_ID')->references('USER_ID')->on('MASTER_USER');
            $table->string('FULLNAME',255);
            $table->string('PHONE_NUMBER');
            $table->string('ADDRESS',255);
            $table->date('ACCOUNT_CREATION_DATE');
            $table->string('PROFILE_IMAGE_URL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('BUYER');
    }
};
