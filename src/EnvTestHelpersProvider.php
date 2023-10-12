<?php

namespace Devertix\EnvTestHelpers;

use Devertix\EnvTestHelpers\Console\Commands\TestLogging;
use Devertix\EnvTestHelpers\Console\Commands\TestMail;
use Illuminate\Support\ServiceProvider;

class EnvTestHelpersProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'env-test-helpers');
        if ($this->app->runningInConsole()) {
            $this->commands(
                TestMail::class,
                TestLogging::class
            );
        }
    }
}
