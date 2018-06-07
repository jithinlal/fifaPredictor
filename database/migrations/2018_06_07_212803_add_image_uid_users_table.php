<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageUidUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('email_verify')->nullable()->after('fav_team_id');
			$table->text('image_url')->nullable()->after('email_verify');
			$table->text('refresh_token')->nullable()->after('image_url');
			$table->text('user_uid')->nullable()->after('refresh_token');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->dropColumn('email_verify');
			$table->dropColumn('image_url');
			$table->dropColumn('refresh_token');
			$table->dropColumn('user_uid');
		});
	}
}
