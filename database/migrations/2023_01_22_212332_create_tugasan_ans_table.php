<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tugasan_ans', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('tugasan_id')->references('id')->on('tugasan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kategori_id')->references('id')->on('kategori_penggunas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tugasan_ans');
    }
};
