<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTeamIdPredictionsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_match_predictions', function (Blueprint $table) {
			$table->integer('team_id')->nullable()->after('prediction');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_match_predictions', function (Blueprint $table) {
			$table->dropColumn('team_id');
		});
	}
}
