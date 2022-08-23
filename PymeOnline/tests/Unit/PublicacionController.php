<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PublicacionController extends TestCase
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

        $response = $this->actingAs($user);

        $response->assertRedirect('/publicacion');
    }


    public function new_post_test()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $request = [
            'producto_id' => '1',
            'tienda_id' => '1',
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


}
