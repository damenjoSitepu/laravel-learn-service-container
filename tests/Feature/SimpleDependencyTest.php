<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Class
use App\Dummy\Category;
use App\Dummy\Product;

// Interfaces
use App\Interfaces\GoodbyeInterface;

// Service
use App\Services\GoodbyeService;

class SimpleDependencyTest extends TestCase
{
    public function test_simple_dependency(): void
    {
        $product = new Product(new Category('Trash'));
        $product2 = new Product(new Category());
        $this->assertEquals('Trash Asus Rog',$product->getFullInformation());
        $this->assertNotSame($product, $product2);
    }

    public function test_simple_dependency_using_service_container(): void 
    {
        $this->app->singleton(Category::class, function() {
            return new Category();
        });
        $category = $this->app->make(Category::class);
        $categoryInProduct = $this->app->make(Product::class);
        $categoryInProduct2 = $this->app->make(Product::class);
        $this->assertSame($category, $categoryInProduct->category);
    }
    
    public function test_simple_dependency_using_service_container_with_dependency_closure(): void 
    {
        $this->app->singleton(Category::class, function() {
            return new Category();
        });

        $this->app->singleton(Product::class, function($app) {
            return new Product($app->make(Category::class));
        });

        $category1 = $this->app->make(Category::class);
        $product1 = $this->app->make(Product::class);
        $product2 = $this->app->make(Product::class);
        $this->assertSame($category1, $product1->category);
        $this->assertSame($product1, $product2);
    }

    public function test_service_container_binding_interface_to_class(): void 
    {
        $this->app->singleton(GoodbyeInterface::class, function() {
            return new GoodbyeService;
        });
        $sayBye1 = $this->app->make(GoodbyeInterface::class);
        $sayBye2 = $this->app->make(GoodbyeInterface::class);
        $this->assertEquals('Goodbye Jojo',$sayBye1->sayBye('Jojo'));
        $this->assertSame($sayBye1,$sayBye2);
    }
}
