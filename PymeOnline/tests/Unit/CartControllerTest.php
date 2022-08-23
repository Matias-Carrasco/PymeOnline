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
    public function carrito_aumentarCantidadDeProductoEnCarro(){

        $user = User::factory()->create(['rol_id' => 3]);

        $request = [
            'id' => 194,
            'quantity' => 2
        ];
        $response = $this->actingAs($user)->post('/update/',$request);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }
    /** @test*/
    public function carrito_borrarProductoDeCarro(){

        $user = User::factory()->create(['rol_id' => 3]);

        $request = [
            'id' => 194
        ];
        $response = $this->actingAs($user)->post('/remove/',$request);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }

    /** @test*/
    public function carrito_limpiarCarrito(){

        $user = User::factory()->create(['rol_id' => 3]);


        $response = $this->actingAs($user)->post('/clear');

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/cart');
    }
}
