<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Match;
use App\Team;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            $predictions = DB::table('predictions')->get();
            $userPredictions = DB::table('user_match_predictions')->where('user_id', Auth::id())->pluck('prediction_id')->toArray();
            // dd($userPredictions);
            $view->with(compact('matches', 'teams', 'predictions', 'userPredictions'));
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
