<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductoControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    
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


    public function test_productoUpdateDescripcionConEspacio(){

        $user = User::factory()->create(['rol_id' => 3]);

        $response = $this->actingAs($user)->patch('/producto/194',[
            'producto_nombre' => 'Zapatillas',
            'producto_descripcion' => 'Bastante comodas y lindas',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/producto');
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

    public function test_productoCreateError2(){

        $user = User::factory()->create(['rol_id' => 3]);
        $request = [
            'producto_nombre' => '',
            'producto_descripcion' => '',
        ];

        $response = $this->actingAs($user)->post('/producto/',$request);

        $response->assertSessionHasErrors();
    }

    // public function test_productoCreate(){
    //     //Storage::fake('local');
    //     //$file = UploadedFile::fake()->create('file.png');
    //     Storage::fake('avatars');
 
    //     $file = UploadedFile::fake()->image('avatar.jpg',100, 100)->size(100);
    //     $user = User::factory()->create(['rol_id' => 3]);
    //     $request = [
    //         'producto_nombre' => 'Zapatillas',
    //         'producto_descripcion' => 'Comodas',
    //         'file' => $file
    //     ];
        
    //     $response = $this->actingAs($user)->post('/producto/',$request);


    //     $response->assertSessionHasNoErrors();
    //     $response->assertRedirect('/producto');
    // }

}
