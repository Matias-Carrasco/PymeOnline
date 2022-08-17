<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class AdminTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_AdminUpdate(){

        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->patch('/admin/3',[
            'cliente_rut' => '195117985',
            'cliente_nombre' => 'Bastian',
            'cliente_apellido' => 'Candia'
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin');
    }

    public function test_AdminUpdateError(){

        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->patch('/admin/3',[
            'cliente_rut' => '-',
            'cliente_nombre' => '!',
            'cliente_apellido' => '!'
        ]);

        $response->assertSessionHasErrors();
    }

    public function test_Banear(){

        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/banear/2');

        $response->assertStatus(302);

        //Devuelve al usuario de prueba al estado original
        $response = $this->actingAs($user)->get('/admin/desbanear/2');
    }

    public function test_BanearYaBaneado(){

        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/banear/2');

        $response = $this->actingAs($user)->get('/admin/banear/2');

        $response->assertStatus(404);

        //Devuelve al usuario de prueba al estado original
        $response = $this->actingAs($user)->get('/admin/desbanear/2');
    }

    public function test_Verificacion(){
        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/verificarb/2');

        $response->assertStatus(302);

        //Devuelve al usuario de prueba al estado original
        $response = $this->actingAs($user)->get('/admin/desverificarb/2');
    }

    public function test_VerificacionYaVerificado(){

        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/verificarb/2');
        $response = $this->actingAs($user)->get('/admin/verificarb/2');

        $response->assertStatus(404);

        //Devuelve al usuario de prueba al estado original
        $response = $this->actingAs($user)->get('/admin/desverificarb/2');
    }

    public function test_BaneearVerificacion(){
        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/verificarb2/2');

        $response->assertStatus(302);

        //Devuelve al usuario de prueba al estado original
        $response = $this->actingAs($user)->get('/admin/desverificarb/2');
        $response = $this->actingAs($user)->get('/admin/desbanear/2');
    }

    public function test_BaneearVerificacionYaBaneado(){
        $user = User::factory()->create(['rol_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/verificarb2/2');
        $response = $this->actingAs($user)->get('/admin/verificarb2/2');

        $response->assertStatus(404);

        //Devuelve al usuario de prueba al estado original
        $response = $this->actingAs($user)->get('/admin/desverificarb/2');
        $response = $this->actingAs($user)->get('/admin/desbanear/2');
    }
}