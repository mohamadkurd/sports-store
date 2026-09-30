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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subcat1_id');
            $table->foreign('subcat1_id')->references('id')->on('subcat1s')->onDelete('cascade');
            $table->string("productname");
            $table->bigInteger("productghimat");
            $table->bigInteger("productghimatghabl")->default('0');
            $table->string("productaks");
            $table->longText('producttozihat');
            $table->integer("producttakhfif")->default('0');
            $table->integer("productmojodi")->default('1');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
