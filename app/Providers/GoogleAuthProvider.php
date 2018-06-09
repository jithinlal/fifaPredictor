<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GoogleAuthProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer('layouts.app', function ($view) {
			$googleApiKey = $_ENV['GOOGLE_API_KEY'];
			$googleDatabaseUrl = $_ENV['GOOGLE_DATABASE_URL'];
			$googleAuthDomain = $_ENV['GOOGLE_AUTH_DOMAIN'];
			$googleProjectId = $_ENV['GOOGLE_PROJECT_ID'];
			$googleMessagingSenderId = $_ENV['GOOGLE_MESSAGING_SENDER_ID'];

			$view->with(compact('googleApiKey', 'googleDatabaseUrl', 'googleAuthDomain', 'googleProjectId', 'googleMessagingSenderId'));
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
