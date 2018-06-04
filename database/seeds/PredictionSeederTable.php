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
				'image' => 'world-cup',
				'forType' => 'team'
			],
			[
				'name' => 'Runner Up',
				'plus' => 400,
				'minus' => 75,
				'type' => 'overall',
				'image' => 'world-cup-2',
				'forType' => 'team'
			],
			[
				'name' => '3rd Place',
				'plus' => 300,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'world-cup-3',
				'forType' => 'team'
			],
			[
				'name' => '4th Place',
				'plus' => 200,
				'minus' => 25,
				'type' => 'overall',
				'image' => 'world-cup-4',
				'forType' => 'team'
			],
			[
				'name' => 'Group A Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-a',
				'forType' => 'team'
			],
			[
				'name' => 'Group B Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-b',
				'forType' => 'team'
			],
			[
				'name' => 'Group C Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-c',
				'forType' => 'team'
			],
			[
				'name' => 'Group D Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-d',
				'forType' => 'team'
			],
			[
				'name' => 'Group E Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-e',
				'forType' => 'team'
			],
			[
				'name' => 'Group F Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-f',
				'forType' => 'team'
			],
			[
				'name' => 'Group G Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-g',
				'forType' => 'team'
			],
			[
				'name' => 'Group H Winner',
				'plus' => 250,
				'minus' => 50,
				'type' => 'overall',
				'image' => 'group-h',
				'forType' => 'team'
			],
			[
				'name' => 'Golden Boot',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'golden-boot',
				'forType' => 'player'
			],
			[
				'name' => 'Golden Ball',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'golden-ball',
				'forType' => 'player'
			],
			[
				'name' => 'Golden Glove',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'golden-glove',
				'forType' => 'goalkeeper'
			],
			[
				'name' => 'Best Young Player',
				'plus' => 500,
				'minus' => 100,
				'type' => 'overall',
				'image' => 'best-young-player',
				'forType' => 'young_player',
			],
			[
				'name' => 'Result',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'result',
			],
			[
				'name' => 'Home Team Goal',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'score',
			],
			[
				'name' => 'Away Team Goal',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'score',
			],
			[
				'name' => 'Yellow Card',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'yesNo',
			],
			[
				'name' => 'Red Card',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'yesNo',
			],
			[
				'name' => 'Hat Trick',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'yesNo',
			],
			[
				'name' => 'Own Goal',
				'plus' => 50,
				'minus' => 25,
				'type' => 'group',
				'image' => '',
				'forType' => 'yesNo',
			]
		]);
	}
}
