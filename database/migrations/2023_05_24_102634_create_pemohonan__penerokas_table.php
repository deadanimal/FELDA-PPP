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
        Schema::create('pemohonan__penerokas', function (Blueprint $table) {
            $table->id();
            $table->string('jumlah');
            $table->foreignId('perkara_id')->references('id')->on('perkara__pemohonans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jawapan_id')->references('id')->on('jawapan')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pemohonan__penerokas');
    }
};
