<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id');
            $table->integer('team_id');
            $table->string('goals_scored');
            $table->integer('points_goals_scored');
            $table->string('result');
            $table->integer('result_point');
            $table->integer('total_point');
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
        Schema::dropIfExists('bonus_points');
    }
}
