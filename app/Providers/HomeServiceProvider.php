<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Match;
use App\Team;

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
            $matches = Match::all();
            $teams = Team::all();
            $view->with(compact('matches', 'teams'));
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
