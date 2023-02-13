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
        Schema::create('perkara_tugasan_progress', function (Blueprint $table) {
            $table->id();
            $table->string('progress');
            $table->string('actual_date');
            $table->foreignId('perkara_tugasan')->references('id')->on('perkara_tugasan')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('perkara_tugasan_progress');
    }
};
