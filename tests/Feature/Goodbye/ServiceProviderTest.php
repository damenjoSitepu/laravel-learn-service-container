<?php

namespace Tests\Feature\Goodbye;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Interfaces
use App\Interfaces\GoodbyeInterface;

class ServiceProviderTest extends TestCase
{
    public function __construct(
        private GoodbyeInterface $goodBye
    ){}

    /**
     * A basic feature test example.
     */
    public function test_binding_interface_to_class_with_registered_service_provider(): void
    {
        $bye1 = $this->app->make(GoodbyeInterface::class);
        $bye2 = $this->app->make(GoodbyeInterface::class);
        $this->assertEquals("Goodbye jojo",$bye1->sayBye('jojo'));
        $this->assertSame($bye1, $bye2);
    }

    public function test_binding_interface_to_class_with_registered_service_provider_without_app_make(): void 
    {
        $bye1 = $this->goodBye->sayBye('kau');
        $this->assertEquals("Goodbye kau",$bye1);
    }
}
