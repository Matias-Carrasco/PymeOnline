<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class CategoriaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testIngresarCategoria()
    {

        $response = $this->post('/categorias', [
            'categoria_nombre'  =>  "zapatos",

        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function testCategoriaError()
    {

        $response = $this->post('/categorias', [
            'categoria_nombre'  =>  "",
        ]);

        //$response->assertStatus(302);
        $response->assertSessionHasErrors();
    }
}
