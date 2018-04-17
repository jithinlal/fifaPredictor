<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Match;
use App\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

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
            // $tomorrow = Carbon::tomorrow('Asia/Kolkata')->format('Y-m-d');
            // $yesterday = Carbon::yesterday('Asia/Kolkata')->format('Y-m-d');
            // $today = Carbon::today('Asia/Kolkata')->format('Y-m-d');

            $matches = Match::orderBy('date', 'ASC')->get();
            $teams = Team::all()->keyBy('id');
            $predictions = DB::table('predictions')->get();
            $userPredictions = DB::table('user_match_predictions')->where([['user_id', Auth::id()],['match_id',0]])->pluck('prediction', 'prediction_id')->toArray();
            $userPredicionIds = DB::table('user_match_predictions')->where('user_id', Auth::id())->pluck('prediction_id')->toArray();
            $userPoints = DB::table('user_match_predictions')->where('user_id', Auth::id())->pluck('pointsObtained')->toArray();
            $sum = 0;
            foreach ($userPoints as $point) {
                $sum += $point;
            }

            $upcomingGames = DB::table('match_days')->join('matches', 'match_days.match_id', '=', 'matches.id')->join('days', 'match_days.day_id', '=', 'days.id')->where('days.day', $tomorrow)->get()->toArray();
            $view->with(compact('matches', 'teams', 'predictions', 'userPredictions', 'userPredicionIds', 'sum', 'upcomingGames'));
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
