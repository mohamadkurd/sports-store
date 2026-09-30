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
        Schema::create('facktours', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("tarakonesh_code")->default('1');
            $table->bigInteger("mablaghkol");
            $table->integer("status")->default('0');
            $table->string("nam");
            $table->string("famil");
            $table->string("ostan");
            $table->string("shahr");
            $table->string("khiabankoche");
            $table->bigInteger("phone");
            $table->bigInteger("codposti");
            $table->string("tozihat")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facktours');
    }
};
