<?php

namespace Donkovah\Teaket;

use Illuminate\Support\ServiceProvider;

class TeaketServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Donkovah\Teaket\Controller\TeaketController');
        $this->mergeConfigFrom(
            __DIR__.'/Config/teaket.php', 'teaket'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Migrations');
        $this->loadViewsFrom(__DIR__.'/Views', 'teaket');
        $this->publishes([
            __DIR__.'/Config/teaket.php' => config_path('teaket.php'),
        ]);
        $this->publishes([
            __DIR__.'/Views' => resource_path('views/vendor/teaket'),
        ]);
    }
}
