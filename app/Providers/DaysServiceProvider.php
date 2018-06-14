<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use App\Meliorate;

class DaysServiceProvider extends ServiceProvider
{
	/**
	 * Upcoming games details
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('home', function ($view) {
			// $nextDayId = -1;
			// $previousDayId = -1;
			// $currentDayId = -1;

			// $today = Carbon::today('Asia/Kolkata')->format('Y-m-d');
			// $today = '2018-06-14';
			// if ($today == '2018-06-13') {
			// 	$nextDayId = 1;
			// }
			// $currentDay = DB::table('days')->where('day', $today)->first();

			// if (!is_null($currentDay)) {
			// 	$currentDayId = $currentDay->id;
			// }

			// if ($currentDayId != 1 && $currentDayId != -1) {
			// 	$previousDayId = $currentDayId - 1;
			// }
			// if ($currentDayId != 25 && $currentDayId != -1) {
			// 	$nextDayId = $currentDayId + 1;
			// }

			// $upcomingGames = DB::table('match_days')->join('matches', 'match_days.match_id', '=', 'matches.id')->join('days', 'match_days.day_id', '=', 'days.id')->where('days.id', $nextDayId)->get()->toArray();

			$upcomingGames = Meliorate::upcomingMatchDayGames();
			$previousGames = Meliorate::previousMatchDayGames();
			$currentGames = Meliorate::currentMatchDayGames();

			$upcomingMatchDayNumber = '';
			if ($upcomingGames && $upcomingGames->count()) {
				$upcomingMatchDayNumber = $upcomingGames[0]->id;
			}

			$previousMatchDayNumber = '';
			if ($previousGames && $previousGames->count()) {
				$previousMatchDayNumber = $previousGames[0]->id;
			}

			$currentMatchDayNumber = '';
			if ($currentGames && $currentGames->count()) {
				$currentMatchDayNumber = $currentGames[0]->id;
			}

			$hasTournamentBegun = Meliorate::hasTournamentBegun();

			$view->with(compact('upcomingGames', 'currentGames', 'previousGames', 'upcomingMatchDayNumber', 'previousMatchDayNumber', 'currentMatchDayNumber', 'hasTournamentBegun'));
		});
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
        //
	}
}
