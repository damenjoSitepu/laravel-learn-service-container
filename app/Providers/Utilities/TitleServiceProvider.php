<?php

namespace App\Providers\Utilities;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

// Class Utilities
use App\Title\HomeTitle;

class TitleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Home Title 
        $this->app->singleton('homeTitle', function() {
            return new HomeTitle();
        });

        // $this->app->singleton(HomeTitle::class, function() {
        //     return new HomeTitle();
        // });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Provides Services
     * 
     * @return array<string>
     */
    // public function provides(): array 
    // {
    //     return [HomeTitle::class];
    // }
}
