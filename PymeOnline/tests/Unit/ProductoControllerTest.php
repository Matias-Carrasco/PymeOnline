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
        $response = $this->patch('/producto/194',[
            'producto_nombre' => 'aaaa',
            'producto_descripcion' => 'asdasdasdasdasd'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/producto');
        $this->assertTrue(true);
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
