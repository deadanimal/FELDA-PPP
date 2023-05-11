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
        Schema::create('hantar__surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->references('id')->on('surats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jawapan_id')->references('id')->on('jawapan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('userCategory_id')->references('id')->on('kategori_penggunas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('hantar__surats');
    }
};
