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
        Schema::create('kelulusan_borangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tahapKelulusan_id')->references('id')->on('tahap_kelulusans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('jawapan_id')->references('id')->on('jawapan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('keputusan');
            $table->string('ulasan')->nullable();
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
        Schema::dropIfExists('kelulusan_borangs');
    }
};
