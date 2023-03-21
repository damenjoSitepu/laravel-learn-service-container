<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Class
use App\Dummy\Category;
use App\Dummy\Product;

class ServiceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_basic_service_provider(): void
    {
        $category1 = $this->app->make(Category::class);
        $categoryInProduct1 = $this->app->make(Product::class);
        $categoryInProduct2 = $this->app->make(Product::class);
        $this->assertSame($category1,$categoryInProduct1->category);
        $this->assertSame($category1,$categoryInProduct2->category);
        $this->assertSame($categoryInProduct1, $categoryInProduct2);
    }
}
