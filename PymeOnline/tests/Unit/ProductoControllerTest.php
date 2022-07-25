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
    public function test_productoUpdate(){

        $user = User::factory()->create(['rol_id' => 3]);

        $response = $this->actingAs($user)->patch('/producto/194',[
            'producto_nombre' => 'Zapatos',
            'producto_descripcion' => 'comodos',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/producto');
    }


    public function test_productoUpdateError(){

        $user = User::factory()->create(['rol_id' => 3]);

        $response = $this->actingAs($user)->patch('/producto/194',[
            'producto_nombre' => '!',
            'producto_descripcion' => '-',
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_productoCreateError(){

        $user = User::factory()->create(['rol_id' => 3]);
        $request = [
            'producto_nombre' => 'Zapatillas',
            'producto_descripcion' => 'Comodas',
        ];

        $response = $this->actingAs($user)->post('/producto/',$request);

        $response->assertSessionHasErrors();
    }

}
