<?php

namespace App\Providers;

use App\Support\View;
use Slim\Psr7\Factory\ResponseFactory;

class BladeServiceProvider extends ServiceProvider
{

    /**
     * will return new view value from the container with the key view
     * @return mixed|void
     */
    public function register()
    {
        $this->app->getContainer()->set(View::class, function () {
            return new View(new ResponseFactory);
        });
    }

    /**
     * * heritage from service provider
     */
    public function boot()
    {
    }
}
