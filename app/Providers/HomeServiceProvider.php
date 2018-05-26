<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Match;
use App\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use App\Stadium;

class HomeServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('home', function ($view) {
			$matches = Match::orderBy('date', 'ASC')->get();
			$teams = Team::all()->keyBy('id');
			$stadia = Stadium::all()->keyBy('id');
			$predictions = DB::table('predictions')->where('id', '<', '17')->get();
			$userPredictions = DB::table('user_match_predictions')->where([['user_id', Auth::id()], ['match_id', 0]])->pluck('prediction', 'prediction_id')->toArray();
			$userPredicionIds = DB::table('user_match_predictions')->where('user_id', Auth::id())->pluck('prediction_id')->toArray();
			$userPoints = DB::table('user_match_predictions')->where('user_id', Auth::id())->pluck('pointsObtained')->toArray();
			$sum = 0;
			foreach ($userPoints as $point) {
				$sum += $point;
			}

            // dd($upcomingGames);
			$view->with(compact('matches', 'teams', 'stadia', 'predictions', 'userPredictions', 'userPredicionIds', 'sum'));
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
