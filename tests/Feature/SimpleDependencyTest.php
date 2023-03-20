<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Class
use App\Dummy\Category;
use App\Dummy\Product;

class SimpleDependencyTest extends TestCase
{
    public function test_simple_dependency(): void
    {
        $product = new Product(new Category);
        $product2 = new Product(new Category);
        $this->assertEquals('Technology Asus Rog',$product->getFullInformation());
        $this->assertNotSame($product, $product2);
    }
}
