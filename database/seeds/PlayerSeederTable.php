<?php

use Illuminate\Database\Seeder;
use App\Player;

class PlayerSeederTable extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('players')->delete();
		$json = File::get("database/data/players.json");
		$data = json_decode($json);
		foreach ($data as $obj) {
			$arr = [];
			$arr['name'] = $obj->Player;
			$arr['team_id'] = 0;
			if ($obj->Position == 'GK' || $obj->Position == '1GK') {
				$arr['gk'] = 1;
			} else {
				$arr['gk'] = 0;
			}
			Player::create($arr);
		}
	}
}
