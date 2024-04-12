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
        Schema::create('photos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('pet_id')->unsigned();
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->timestamps();
            $table->string('name');
            $table->string('title');
            $table->string('desc');
            $table->string('size');
            $table->integer('like');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo');
    }
};
