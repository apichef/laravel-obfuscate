<?php

namespace ApiChef\Obfuscate;

use ApiChef\Obfuscate\Dummy\Post;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Support\Facades\Route;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->artisan('migrate', ['--database' => 'testbench']);
        $this->withFactories(__DIR__.'/database/factories');
        $this->registerRoutes();
    }

    protected function getPackageProviders($app)
    {
        return [
            ObfuscateServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('obfuscate', [
            'prime' => 1580030173,
            'inverse' => 59260789,
            'xor' => 1163945558,
        ]);
    }

    protected function registerRoutes(): void
    {
        Route::middleware(SubstituteBindings::class)
            ->get('/posts/{post}', function (Post $post) {
                return $post->toArray();
            })->name('post.show');
    }
}
