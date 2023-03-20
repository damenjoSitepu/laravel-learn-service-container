<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Data
use App\Data\HelloWorld;
use App\Data\Product;
use App\Data\Phone;
// Interfaces
use App\Interfaces\PhoneInterface;



class BasicServiceContainerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_basic_service_container(): void
    {
        $hello = $this->app->make(HelloWorld::class);
        $hello2 = $this->app->make(HelloWorld::class);

        // Assertion
        $this->assertEquals('Hello World',$hello->getName(),'Failed!');
        $this->assertEquals('Hello World',$hello2->getName(),'Failed!');
        $this->assertNotSame($hello, $hello2,'Failed!');
    }

    public function test_basic_service_container_with_bind(): void 
    {
        $this->app->bind(Product::class, function($app) {
            return new Product('Chitato',50);
        });

        $product1 = $this->app->make(Product::class);
        $product2 = $this->app->make(Product::class);

        // Assertion
        $this->assertEquals('Chitato',$product1->name,'Failed!');
        $this->assertEquals('Chitato',$product2->name,'Failed!');
        $this->assertNotSame($product1, $product2, 'Failed!');
    }

    public function test_basic_service_container_with_singleton(): void 
    {
        $this->app->singleton(Product::class, function($app) {
            return new Product('Dam',100);
        });

        $product1 = $this->app->make(Product::class);
        $product2 = $this->app->make(Product::class);
        $this->assertEquals('Dam',$product1->name);
        $this->assertEquals('Dam',$product2->name);
        $this->assertSame($product1,$product2);
    }

    public function test_basic_service_container_with_instance(): void 
    {
        $productInstance = new Product('Men',0);
        $this->app->instance(Product::class,$productInstance);

        $product1 = $this->app->make(Product::class);
        $product2 = $this->app->make(Product::class);
        $this->assertEquals('Men',$product1->name);
        $this->assertEquals('Men',$product2->name);
        $this->assertSame($product1,$product2);
    }

    public function test_basic_service_container_binding_interface_to_object(): void 
    {
        $this->app->singleton(PhoneInterface::class, Phone::class);
        $phone = $this->app->make(PhoneInterface::class);
        $phone2 = $this->app->make(PhoneInterface::class);
        $this->assertEquals('Ini Iphone',$phone->definition('Iphone'));
        $this->assertSame($phone, $phone2);
    }
}
