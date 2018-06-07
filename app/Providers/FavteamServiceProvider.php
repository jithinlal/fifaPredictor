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
			$groupATeams = Team::where('group_name', 'A')->get()->keyBy('id');
			$groupBTeams = Team::where('group_name', 'B')->get()->keyBy('id');
			$groupCTeams = Team::where('group_name', 'C')->get()->keyBy('id');
			$groupDTeams = Team::where('group_name', 'D')->get()->keyBy('id');
			$groupETeams = Team::where('group_name', 'E')->get()->keyBy('id');
			$groupFTeams = Team::where('group_name', 'F')->get()->keyBy('id');
			$groupGTeams = Team::where('group_name', 'G')->get()->keyBy('id');
			$groupHTeams = Team::where('group_name', 'H')->get()->keyBy('id');
			$view->with(compact('teams', 'groupATeams', 'groupBTeams', 'groupCTeams', 'groupDTeams', 'groupETeams', 'groupFTeams', 'groupGTeams', 'groupHTeams'));
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
