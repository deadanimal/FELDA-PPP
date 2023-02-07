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
        Schema::create('jawapan_medans', function (Blueprint $table) {
            $table->id();
            $table->string('jawapan');
            $table->foreignId('jawapan_id')->references('id')->on('jawapan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('medan_id')->references('id')->on('medan')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jawapan_medans');
    }
};
