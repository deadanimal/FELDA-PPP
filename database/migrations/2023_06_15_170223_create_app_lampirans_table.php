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
        Schema::create('app_lampirans', function (Blueprint $table) {
            $table->id();
            $table->string('file');
            $table->foreignId('jawapan_id')->references('id')->on('jawapan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('lampiran_id')->references('id')->on('lampirans')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('app_lampirans');
    }
};
