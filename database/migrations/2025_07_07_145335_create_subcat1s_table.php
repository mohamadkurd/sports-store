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
        Schema::create('subcat1s', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('maincat_id');
            $table->foreign('maincat_id')->references('id')->on('maincats')->onDelete('cascade');
            $table->string("subcat1name");
            $table->string("subcatimg");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcat1s');
    }
};
