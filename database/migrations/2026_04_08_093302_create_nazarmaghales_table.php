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
        Schema::create('nazarmaghales', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('maghale_id');
             $table->foreign('maghale_id')->references('id')->on('maghales')->onDelete('cascade');
             $table->string("username");
             $table->string("nazar");
             $table->integer("status")->default('0');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nazarmaghales');
    }
};
