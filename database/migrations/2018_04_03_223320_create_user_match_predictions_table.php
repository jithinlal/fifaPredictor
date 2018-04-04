<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserMatchPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_match_predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('match_id');
            $table->integer('prediction_id');
            $table->integer('prediction');
            $table->integer('pointsObtained');
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
        Schema::dropIfExists('user_match_predictions');
    }
}
