<?php

namespace Biggercode\EvolutionGoSdk;

use Illuminate\Support\ServiceProvider;

class EvolutionGoSdkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/evolutiongosdk.php' => config_path('evolutiongosdk.php'),
            ], 'evolutiongosdk-config');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/evolutiongosdk.php', 'evolutiongosdk'
        );

        $this->app->singleton(EvolutionGoClient::class, function ($app) {
            return new EvolutionGoClient(
                config('evolutiongosdk.url'),
                config('evolutiongosdk.global_key')
            );
        });
    }
}
