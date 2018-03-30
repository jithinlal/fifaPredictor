<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Match;

class MatchSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matches')->delete();
        $json = File::get("database/data/matches.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Match::create(array(
                'type' => $obj->type,
                'home_team' => $obj->home_team,
                'away_team' => $obj->away_team,
                'home_result' => $obj->home_result,
                'away_result' => $obj->away_result,
                'date' => $obj->date,
                'stadium_id' => $obj->stadium,
                'finished' => $obj->finished
            ));
        }
    }
}
