<?php

use DI\Container;
use DI\Bridge\Slim\Bridge as SlimAppFactory;
use App\Providers\ServiceProvider;

//declare SlimAppFactory our Route with new container
$app = SlimAppFactory::create(new Container);

ServiceProvider::setup($app, config('app.providers'));// run our service Provider

return $app; // return our application to index.php
