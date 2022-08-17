<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class CartControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    

    /** @test*/
    public function test_insertarProductoACarro(){

        $user = User::factory()->create(['rol_id' => 3]);

        $request = [
            'id' => 194,
            'quantity' => 1
        ];

        // Realizar consulta a tags.store
        $response = $this->actingAs($user)->post('/add/',$request);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }

    /** @test*/
    public function test_aumentarCantidadDeProductoEnCarro(){

        $user = User::factory()->create(['rol_id' => 3]);

        $request = [
            'id' => 194,
            'quantity' => 2
        ];

        // Realizar consulta a tags.store
        $response = $this->actingAs($user)->post('/update/',$request);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }
    /** @test*/
    public function test_borrarProductoDeCarro(){

        $user = User::factory()->create(['rol_id' => 3]);

        $request = [
            'id' => 194
        ];

        // Realizar consulta a tags.store
        $response = $this->actingAs($user)->post('/remove/',$request);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }

    /** @test*/
    public function test_limpiarCarrito(){

        $user = User::factory()->create(['rol_id' => 3]);


        // Realizar consulta a tags.store
        $response = $this->actingAs($user)->post('/clear');

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }
}
