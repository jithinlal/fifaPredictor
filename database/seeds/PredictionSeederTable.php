<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PredictionSeederTable extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('predictions')->insert([
			[
				'name' => '2018 World Cup Winner',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'world-cup'
			],
			[
				'name' => 'Runner Up',
				'plus' => 400,
				'minus' => 75,
				'type' => 'overall',
				'image' => 'world-cup-2'
			],
			[
				'name' => '3rd Place',
				'plus' => 300,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'world-cup-3'
			],
			[
				'name' => '4th Place',
				'plus' => 200,
				'minus' => 25,
				'type' => 'overall',
				'image' => 'world-cup-4'
			],
			[
				'name' => 'Group A Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-a'
			],
			[
				'name' => 'Group B Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-b'
			],
			[
				'name' => 'Group C Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-c'
			],
			[
				'name' => 'Group D Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-d'
			],
			[
				'name' => 'Group E Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-e'
			],
			[
				'name' => 'Group F Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-f'
			],
			[
				'name' => 'Group G Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-g'
			],
			[
				'name' => 'Group H Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-h'
			],
			[
				'name' => 'Golden Boot',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'golden-boot'
			],
			[
				'name' => 'Golden Ball',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'golden-ball'
			],
			[
				'name' => 'Golden Glove',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'golden-glove'
			],
			[
				'name' => 'Best Young Player',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'best-young-player'
			],
			[
				'name' => 'Home Team Goal',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => ''
			],
			[
				'name' => 'Away Team Goal',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => ''
			],
			[
				'name' => 'Yellow Card',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => ''
			],
			[
				'name' => 'Red Card',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => ''
			],
			[
				'name' => 'Hat Trick',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => ''
			],
			[
				'name' => 'Own Goal',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => ''
			]
		]);
	}
}
