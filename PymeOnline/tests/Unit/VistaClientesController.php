<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class VistaClientesController extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testAccest()
    {
        $user = User::factory()->create(['rol_id' => '2']);
        // Redireccionar y comprobar vista
        $response = $this->actingAs($user)->get('/vistacliente/10');
        $response->assertStatus(200);
    }



}
