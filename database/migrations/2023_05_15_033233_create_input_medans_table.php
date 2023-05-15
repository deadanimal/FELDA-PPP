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
        Schema::create('input_medans', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->foreignId('medanPO_id')->references('id')->on('medan_po')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('tindakanTugasan_id')->references('id')->on('tindakan_tugasans')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('input_medans');
    }
};
