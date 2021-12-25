<?php

namespace App\Providers;

use Slim\App;

abstract class ServiceProvider
{
    public App $app;

    /**
     * last heritage
     * @param App $app reference
     */
    final public function __construct(App &$app)
    {
        $this->app = $app;
    }

    /**
     * register the service provider
     * @return mixed
     */
    abstract public function register();

    /**
     * boot the service provider
     * @return mixed
     */
    abstract public function boot();

    /**
     * iterate all our service provider then construct, register and boot them
     * @param App $app
     * @param array $providers
     * @return void
     */
    final public static function setup(App &$app, array $providers)
    {
        $providers = array_map(fn($provider) => new $provider($app), $providers);

        array_walk($providers, fn(ServiceProvider $provider) => $provider->register());
        array_walk($providers, fn(ServiceProvider $provider) => $provider->boot());
    }
}
