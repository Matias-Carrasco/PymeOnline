<?php

namespace Tests\Unit;

use App\Models\tag;
use App\Models\tag_publicacion;
use App\Models\tienda;
use App\Models\User;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    
    public function test_view_index_while_logged()
    {
        // Crear usuario 
        $user = User::factory()->create(['rol_id' => '3']);

        // Redireccionar y comprobar vista
        $response = $this->actingAs($user)->get('/tags');
        $response->assertStatus(200);
        
    }

    public function test_store_new_tag()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $request = [
            'tag_nombre' => 'electronica'
        ];

        // Realizar consulta a tags.store
        $response = $this->actingAs($user)->post('/tags/',$request);

        // Comprobar redireccionamiento e insercion
        $response->assertStatus(302);
        $this->assertDatabaseHas('tags',[
            'tienda_id' => '3', // 3 hardcodeado debido al factory de user que se apropia de la tienda '3'
            'tag_nombre' => 'electronica'
        ]);
    }

    public function test_update_existing_tag()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id','=',$user->id)->first();
        $primer_tag = tag::where('tienda_id','=',$tienda->tienda_id)->first();
        $request = [
            'tag_nombre' => 'yeet2'
        ];

        // Realizar consulta a tags.update
        $response = $this->actingAs($user)->patch('/tags/'.$primer_tag->tag_id,$request);

        // Comprobar el cambio a la bdd
        $response->assertStatus(302);
        $this->assertDatabaseHas('tags',[
            'tienda_id' => $tienda->tienda_id,
            'tag_nombre' => 'yeet2'
        ]);
    }

    public function test_update_nonexisting_tag()
    {
        
        // Crear request y nuevo tag_id el cual no se encuentre presente en el array
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id','=',$user->id)->first();
        $tags = tag::where('tienda_id','=',$tienda->tienda_id)->get()->toArray();
        do{
            $rand = rand(1000,23041);
        }while(in_array($rand,$tags));
        $request = [
            'tag_nombre' => 'invalidyeet'
        ];

        // Realizar consulta a tags.update con tag_id invalido
        $response = $this->actingAs($user)->patch('/tags/'.$rand,$request);

        // Comprobar que no se realizo el cambio en la bdd
        $response->assertStatus(302);
        $this->assertDatabaseMissing('tags',[
            'tienda_id' => $tienda->tienda_id,
            'tag_nombre' => 'invalidyeet'
        ]);
    }

    public function test_destroy_used_existing_tag()
    {
        // Crear request
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id','=',$user->id)->first();
        $tags_tienda = tag::where('tienda_id','=',$tienda->tienda_id)->pluck('tag_id');
        $primer_tag_en_uso = tag_publicacion::whereIn('tag_id',$tags_tienda->toArray())->first();

        // Realizar consulta a tags.destroy
        $response = $this->actingAs($user)->delete('/tags/'.$primer_tag_en_uso->tag_id);
        
        // Comprobar que no se elimino de la bdd debido a dependencias de llaves foraneas
        $response->assertStatus(500);
        $this->assertDatabaseHas('tags',[
            'tag_id' => $primer_tag_en_uso->tag_id
        ]);
    }

    public function test_destroy_unused_existing_tag()
    {
        // Obtener primer tag de la tienda que no se encuentre linkeado a un producto
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id','=',$user->id)->first();
        $tags_tienda = tag::where('tienda_id','=',$tienda->tienda_id)->pluck('tag_id');
        fwrite(STDERR, print_r($tags_tienda, TRUE));
        $tags_usados = tag_publicacion::whereIn('tag_id',$tags_tienda)->pluck('tag_id');
        fwrite(STDERR, print_r($tags_usados, TRUE));
        $arr = array_diff($tags_tienda->toArray(),$tags_usados->toArray());
        $primer_tag_sin_uso = reset($arr);
        fwrite(STDERR, print_r($primer_tag_sin_uso, TRUE));

        // Realizar consulta a tags.destroy
        $response = $this->actingAs($user)->delete('/tags/'.$primer_tag_sin_uso);
        
        // Comprobar que se elimino de la bdd
        $response->assertStatus(302);
        $this->assertDatabaseMissing('tags',[
            'tag_id' => $primer_tag_sin_uso
        ]);
    }

}
