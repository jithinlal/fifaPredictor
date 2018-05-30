<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Team;

class FavteamServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('myteam.index', function ($view) {
			$teams = Team::all()->keyBy('id');

			$view->with(compact('teams'));
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
