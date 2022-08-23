<?php

namespace Tests\Unit;

use App\Models\user;
use App\Models\tienda;
use App\Models\publicacion;
use App\Models\pregunta;
use Tests\TestCase;

class PreguntaControllerTest extends TestCase
{

    public function test_store_new_pregunta()
    {
        // Crear modelos y request
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();
        $request = [
            'publicacion_id' => $publicacion->publicacion_id,
            'pregunta_texto' =>'Soy una pregunta.',
        ];
        // Realizar consulta a pregunta.store
        $response = $this->actingAs($user)->post('/pregunta/',$request);

        // Comprobar redireccionamiento e insercion
        $response->assertStatus(302);
        $this->assertDatabaseHas('preguntas',[
            'pregunta_texto' =>'Soy una pregunta.',
        ]);
    }

    public function test_store_new_pregunta_error()
    {
        // Crear usuario y request
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();
        $request = [
            'publicacion_id' => $publicacion->publicacion_id,
            'pregunta_texto' =>'The FitnessGram™ Pacer Test is a multistage aerobic capacity test
            that progressively gets more difficult as it continues. The 20 meter pacer test will begin
            in 30 seconds. Line up at the start. The running speed starts slowly, but gets faster each 
            minute after you hear this signal. [beep] A single lap should be completed each time you hear 
            this sound. [ding] Remember to run in a straight line, and run as long as possible. The second 
            time you fail to complete a lap before the sound, your test is over. The test will begin on the 
            word start. On your mark, get ready, start.',
        ];
        // Realizar consulta a pregunta.store
        $response = $this->actingAs($user)->post('/pregunta/',$request);

        // Comprobar error de inserción
        $response->assertSessionHasErrors();
    }
}