<?php

namespace Tests\Unit;

use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_AdminUpdate(){

        $response = $this->patch('/admin/4',[
            'cliente_rut' => '195117985',
            'cliente_nombre' => 'Bastian',
            'cliente_apellido' => 'Candia'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin');
    }

    public function test_AdminUpdateError(){

        $response = $this->patch('/admin/4',[
            'cliente_rut' => '-',
            'cliente_nombre' => '!',
            'cliente_apellido' => '!'
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_Banear(){

        $response = $this->get('/admin/banear/2');

        $response->assertStatus(302);

        //Devuelve al usuario de prueba al estado original
        $response = $this->get('/admin/desbanear/2');
    }

    public function test_BanearYaBaneado(){

        $response = $this->get('/admin/banear/2');

        $response = $this->get('/admin/banear/2');

        $response->assertStatus(404);

        //Devuelve al usuario de prueba al estado original
        $response = $this->get('/admin/desbanear/2');
    }
}
