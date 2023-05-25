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
        Schema::create('penerimaan_bekalans', function (Blueprint $table) {
            $table->id();
            $table->string('pengesahan')->nullable();
            $table->text('kenyataan')->nullable();
            $table->foreignId('pemohonan_id')->references('id')->on('pemohonan__penerokas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('penerimaan_bekalans');
    }
};
