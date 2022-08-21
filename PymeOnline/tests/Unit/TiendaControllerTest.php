<?php

namespace Tests\Unit;
use App\Models\tienda;
use App\Models\user;
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

    public function test_store_new_tienda()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $request = [
            'tienda_rut_responsable' => '989879878',
            'tienda_nombre_responsable' => 'John',
            'tienda_primer_apellido_responsable' => 'Doe',
            'tienda_segundo_apellido_responsable' => 'McLovin',
            'tienda_nombre' => 'Cafe con sabor a té',
            'tienda_numero_contacto' => '12345678',
            'tienda_mail_contacto' => 'sample@text.com'
        ];

        // Realizar consulta a tienda.store
        $response = $this->actingAs($user)->post('/tienda/',$request);

        // Comprobar redireccionamiento e insercion
        $response->assertStatus(302);
        $this->assertDatabaseHas('tiendas',[
            'estilo_id' => '1',
            'id' => $user['id'],
            'direccion_id' => '1',
            'tienda_rut_responsable' => '989879878',
            'tienda_nombre_responsable' => 'John',
            'tienda_primer_apellido_responsable' => 'Doe',
            'tienda_segundo_apellido_responsable' => 'McLovin',
            'tienda_nombre' => 'Cafe con sabor a té',
            'tienda_numero_contacto' => '12345678',
            'tienda_mail_contacto' => 'sample@text.com',
        ]);
    }

    public function test_store_new_tienda_error()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $request = [
            'tienda_rut_responsable' => '989879877',
            'tienda_nombre_responsable' => 'John',
            'tienda_primer_apellido_responsable' => 'Doe',
            'tienda_segundo_apellido_responsable' => 'McLovin',
            'tienda_nombre' => 'Cafe con sabor a café y quizás otras cosas ups restricción de carácteres jaja',
            'tienda_numero_contacto' => '12345678',
            'tienda_mail_contacto' => 'sample@text.io'
        ];

        // Realizar consulta a tienda.store
        $response = $this->actingAs($user)->post('/tienda/',$request);

        // Comprobar error de inserción
        $response->assertSessionHasErrors();
    }

    public function test_update_store()
    {
         // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $request = [
            'tienda_rut_responsable' => '98987986',
            'tienda_nombre_responsable' => 'John',
            'tienda_primer_apellido_responsable' => 'Doe',
            'tienda_segundo_apellido_responsable' => 'McLovin',
            'tienda_nombre' => 'Cafe con sabor a cartón',
            'tienda_numero_contacto' => '12345678',
            'tienda_mail_contacto' => 'sample@text.ar'
        ];
        // Realizar consulta a tienda.store
        $response = $this->actingAs($user)->patch('/tienda/',$request);
        $tienda = tienda::where('id','=',$user->id)->first();
        $request =[
            'tienda_rut_responsable' => '98987986',
            'tienda_nombre_responsable' => 'EU',
            'tienda_primer_apellido_responsable' => 'RE',
            'tienda_segundo_apellido_responsable' => 'KA',
            'tienda_nombre' => 'MAGNETS',
            'tienda_numero_contacto' => '12345678',
            'tienda_mail_contacto' => 'sample@text.ar'
        ];
        // Realizar consulta a tienda.update
        $response = $this->actingAs($user)->patch('/tienda/'.$tienda->tienda_id, $request);
        // Comprobar el cambio a la bdd
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('tienda');
    }

    public function test_update_store_error()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $request = [
            'tienda_rut_responsable' => '98987985',
            'tienda_nombre_responsable' => 'John',
            'tienda_primer_apellido_responsable' => 'Doe',
            'tienda_segundo_apellido_responsable' => 'McLovin',
            'tienda_nombre' => 'Cafe con sabor a cartón',
            'tienda_numero_contacto' => '12345678',
            'tienda_mail_contacto' => 'sample@text.ar'
        ];
        // Realizar consulta a tienda.store
        $response = $this->actingAs($user)->patch('/tienda/',$request);
        $tienda = tienda::where('id','=',$user->id)->first();
        $request =[
            'tienda_nombre' => 'MAGNETSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS',
            'tienda_numero_contacto' => '12345678'
        ];
        // Realizar consulta a tienda.update
        $response = $this->actingAs($user)->patch('/tienda/'.$tienda->tienda_id, $request);

        // Comprobar error de editado
        $response->assertSessionHasErrors();
    }
}