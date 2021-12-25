<?php

namespace App\Providers;

class ErrorMiddlewareServiceProvider extends ServiceProvider
{

    /**
     * register the error-middleware in the service provider
     */
    public function register()
    {
        $this->app->addErrorMiddleware(
            config('middleware.error_details.displayErrorDetails'),
            config('middleware.error_details.logErrors'),
            config('middleware.error_details.logErrorDetails')
        );
    }

    /**
     * heritage from service provider
     */
    public function boot()
    {
    }
}
