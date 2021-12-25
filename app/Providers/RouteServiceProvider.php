<?php

namespace App\Providers;

use App\Support\Route;

class RouteServiceProvider extends ServiceProvider
{

    /**
     * static wrapper the app
     */
    public function register()
    {
        Route::setup($this->app);
    }

    /**
     * require "./routes/web.php"
     */
    public function boot()
    {
        require routes_path('web.php');
    }
}
