<?php

namespace ApiChef\Obfuscate;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Optimus\Optimus;

class ObfuscateServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/obfuscate.php' => config_path('obfuscate.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/obfuscate.php',
            'obfuscate'
        );

        $this->app->singleton(Optimus::class, function ($app) {
            return new Optimus(
                config('obfuscate.prime'),
                config('obfuscate.inverse'),
                config('obfuscate.xor')
            );
        });
    }
}
