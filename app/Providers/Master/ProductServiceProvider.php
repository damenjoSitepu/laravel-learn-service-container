<?php

namespace App\Providers\Master;

use Illuminate\Support\ServiceProvider;

// Class
use App\Dummy\Category;
use App\Dummy\Product;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Create Category Singleton Dependency
        $this->app->singleton(Category::class, function() {
            return new Category();
        });
        // Create Product Singleton Dependency
        $this->app->singleton(Product::class, function($app) {
            return new Product($app->make(Category::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
