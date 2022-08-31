<?php

namespace Tests\Unit;

use App\Models\user;
use App\Models\tienda;
use App\Models\publicacion;
use App\Models\pregunta;
use App\Models\respuesta;
use Tests\TestCase;

class RespuestaControllerTest extends TestCase
{

    public function test_store_new_respuesta()
    {
        // Crear modelos y request
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();
        $pregunta = pregunta::where('publicacion_id', '=', $publicacion->publicacion_id)->first();

        // Realizar consulta a respuesta.store
        $request = [
            'pregunta_id' => $pregunta->pregunta_id,
            'respuesta_texto' =>'Soy una respuesta.',
        ];
        $response = $this->actingAs($user)->post('/respuesta/',$request);
        // Comprobar redireccionamiento e insercion
        $response->assertStatus(302);
        $this->assertDatabaseHas('respuestas',[
            'respuesta_texto' =>'Soy una respuesta.',
        ]);
    }

    public function test_store_new_respuesta_error()
    {
        // Crear modelos y request
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();
        $pregunta = pregunta::where('publicacion_id', '=', $publicacion->publicacion_id)->first();
        // Realizar consulta a respuesta.store
        $request = [
            'pregunta_id'=>$pregunta->pregunta_id,
            'respuesta_texto' =>'The FitnessGram™ Pacer Test is a multistage aerobic capacity test
            that progressively gets more difficult as it continues. The 20 meter pacer test will begin
            in 30 seconds. Line up at the start. The running speed starts slowly, but gets faster each 
            minute after you hear this signal. [beep] A single lap should be completed each time you hear 
            this sound. [ding] Remember to run in a straight line, and run as long as possible. The second 
            time you fail to complete a lap before the sound, your test is over. The test will begin on the 
            word start. On your mark, get ready, start.',
        ];
        // Realizar consulta a respuesta.store
        $response = $this->actingAs($user)->post('/respuesta/',$request);

        // Comprobar error de inserción
        $response->assertSessionHasErrors();
    }
}