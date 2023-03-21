<?php

namespace App\Providers\Master;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

// Interfaces
use App\Interfaces\GoodbyeInterface;
// Services
use App\Services\GoodbyeService;

class GoodbyeServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        echo 'Goodbye service provider auto called';
        $this->app->singleton(GoodbyeInterface::class, GoodbyeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [GoodbyeInterface::class, GoodbyeService::class];
    }
}
