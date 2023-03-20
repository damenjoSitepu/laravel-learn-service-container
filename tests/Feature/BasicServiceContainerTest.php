<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Data
use App\Data\HelloWorld;

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
}
