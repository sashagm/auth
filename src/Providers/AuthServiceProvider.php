<?php

namespace Sashagm\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/login.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'auth');

        $this->publishes([
            __DIR__.'/../config/login.php' => config_path('login.php'),
        ]);
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/auth'),
        ]);
    }
}
