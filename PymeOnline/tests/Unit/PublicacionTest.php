<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PublicacionTest extends TestCase
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



    public function test_productAcces(){

        $user = User::factory()->create(['rol_id' => 3]);

        $response = $this->actingAs($user)->get('/publicacion');

        $response->assertStatus(200);
    }


    public function test_publicacionCreate(){

        $user = User::factory()->create(['rol_id' => 3]);

        $response = $this->actingAs($user)->patch('/publicacion/create',[
            'publicacion_id' => '562',
            'tienda_id' => '1',
            'producto_id'=>'503',
            'categoria_id'=>'3',
            'pulicacion_activo'=>'1',
            'publicacion_titulo'=>'prueba',
            'publicacion_precio'=>'28844',
            'publicacion_oferta_porcentual'=>"9"
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/publicacion');
    }


    public function testUnablePublication()
    {

        $user = User::factory()->create(['rol_id' => 3]);

        $response=$this->actingAs($user)->delete('/publicacion/3');
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/publicacion');
    }

    



}
