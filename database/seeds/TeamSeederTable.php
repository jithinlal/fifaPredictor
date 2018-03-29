<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Team;

class TeamSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->delete();
        $json = File::get("database/data/teams.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Team::create(array(
                'name' => $obj->name,
                'iso2' => $obj->iso2
            ));
        }
    }
}
