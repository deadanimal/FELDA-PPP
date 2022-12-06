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
        Schema::table('borangs', function (Blueprint $table) {
            $table->json('context')->nullable();
            $table->string('borangPdf')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('borangs', function (Blueprint $table) {
            $table->dropColumn('context');
            $table->dropColumn('borangPdf');
        });
    }
};
