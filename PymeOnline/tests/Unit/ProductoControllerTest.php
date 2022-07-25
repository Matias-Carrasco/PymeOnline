<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class ProductoControllerTest extends TestCase
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

    /** @test*/
    public function creacion_producto()
    {   
        $user = User::factory()->create(['rol_id' => 3]);

        $request = [
            'producto_nombre' => 'Zapatos',
            'producto_descripcion' => 'comodos',
            'file' => 'urlalgo'
        ];

        $response = $this->actingAs($user)->post('/producto/',$request);

        //$response->assertSessionHasNoErrors();
        $response->assertStatus(302);
        $response->assertRedirect('/producto');
        //$this->assertTrue(true);
    }

    /**
     * Testing create posts and checked if exists and can be visualed
     *
     * @return void
     */
    public function testCreatePost()//copiada de internet, por modificar
    {
    }
}
