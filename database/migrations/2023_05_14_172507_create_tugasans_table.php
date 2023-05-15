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
        Schema::create('tugasans', function (Blueprint $table) {
            $table->id();
            $table->string('perkara');
            $table->string('jenis_file');
            $table->string('due_date');
            $table->foreignId('userCategory_id')->references('id')->on('kategori_penggunas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('borang_id')->references('id')->on('borangs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('tugasans');
    }
};
