<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourtPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_player', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();


            $table->integer('court_id')->unsigned();
            $table->integer('player_id')->unsigned();

            # Make foreign keys
            $table->foreign('court_id')->references('id')->on('courts');
            $table->foreign('player_id')->references('id')->on('players');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('court_player');
    }
}
