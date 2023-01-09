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
        Schema::create('tugasan', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('jenisTugas');
            $table->foreignId('userKategori')->references('id')->on('kategori_penggunas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('proses_id')->references('id')->on('proses')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tugasan');
    }
};
