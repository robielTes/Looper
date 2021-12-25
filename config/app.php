<?php

return [
    'providers' => [//list of all our service providers
        \App\Providers\BladeServiceProvider::class,
        \App\Providers\RouteServiceProvider::class,
        \App\Providers\ErrorMiddlewareServiceProvider::class,
    ]
];
