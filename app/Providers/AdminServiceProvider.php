<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {       
        //View::share('overallPredictions', $overallPredictions);
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
