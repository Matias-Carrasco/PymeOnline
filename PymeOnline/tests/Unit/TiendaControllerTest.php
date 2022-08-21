<?php

namespace Tests\Unit;
use App\Models\Tienda;
use App\Models\User;
use Tests\TestCase;

class TiendaControllerTest extends TestCase
{
    
    public function test_view_index_while_logged()
    {
        // Crear usuario 
        $user = User::factory()->create(['rol_id' => '3']);

        // Redireccionar y comprobar vista
        $response = $this->actingAs($user)->get('/tienda');
        $response->assertStatus(200);
    }

}