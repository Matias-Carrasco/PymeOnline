<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class VistaClienteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }



    public function testAcces()
    {
        $user = User::factory()->create(['rol_id' => '2']);
        // Redireccionar y comprobar vista
        $response = $this->actingAs($user)->get('/vistacliente/10');
        $response->assertStatus(200);
    }
}
