<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Stadium;

class StadiumSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stadia')->delete();
        $json = File::get("database/data/stadium.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            Stadium::create(array(
                'name' => $obj->name,
                'city' => $obj->city
            ));
        }
    }
}
