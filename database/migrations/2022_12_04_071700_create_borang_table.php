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
        Schema::create('borangs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('namaBorang');
            $table->bigInteger('status');
            $table->foreignId('proses')->references('id')->on('proses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borang');
    }
};
