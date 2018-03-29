<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->integer('winner')->dafault(0);
            $table->string('first_team_score')->nullable();
            $table->string('first_player_score')->nullable();
            $table->string('first_player_yellow')->nullable();
            $table->boolean('red_card')->default(false);
            $table->boolean('hat_trick')->default(false);
            $table->timestamps();
        });

        Schema::table('match_result', function (Blueprint $table) {
            $table->foreign('match_id')->references('id')->on('matches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_result');
    }
}
