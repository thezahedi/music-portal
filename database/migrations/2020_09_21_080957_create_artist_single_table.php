<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistSingleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist_single', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->references('id')->on('artists');
            $table->foreignId('single_id')->references('id')->on('singles');
            $table->foreignId('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist_single');
    }
}
