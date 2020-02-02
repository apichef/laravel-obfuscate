<?php

namespace LaravelObfuscate;

use Illuminate\Support\ServiceProvider;
use Jenssegers\Optimus\Optimus;

class ObfuscateServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Optimus::class, function ($app) {
            return new Optimus(
                config('obfuscate.prime'),
                config('obfuscate.inverse'),
                config('obfuscate.xor')
            );
        });
    }
}
