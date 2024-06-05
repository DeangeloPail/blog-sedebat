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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('img');
            $table->text('contenido', 1000);
            $table->boolean('destacada')->default(false);
            $table->unsignedBigInteger('writer_id')->nullable();
            $table->foreign('writer_id')->references('id')->on('writers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};