<?php

namespace Tests\Unit;

use App\Models\resena;
use App\Models\publicacion;
use App\Models\tienda;
use App\Models\User;
use Tests\TestCase;

class ResenaTest extends TestCase
{

    public function test_promedio_resenas()
    {
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();

        // guardar y borrar de bd resenas antiguas
        $resenasOld = resena::where('publicacion_id', '=', $publicacion->publicacion_id)->get();
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();

        $res1 = [
            'publicacion_id' => $publicacion->publicacion_id,
            'resena_califacion' => '3',
            'resena_texto' => 'ad keke',
        ];
        $res2 = [
            'publicacion_id' => $publicacion->publicacion_id,
            'resena_califacion' => '5',
            'resena_texto' => 'ad possum',
        ];

        resena::create($res1);
        resena::create($res2);
        $this->assertDatabaseHas('resenas', $res1);
        $this->assertDatabaseHas('resenas', $res2);

        $response = $this->actingAs($user)->get('/publicacion/score/' . $publicacion->publicacion_id);
        $response->assertJson(['data' => 4]);

        // borrar cambios y restaurar resenas
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();
        if (!empty($resenasOld)) {
            resena::insert($resenasOld->toArray());
        }
    }

    public function test_promedio_sin_resenas()
    {
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();

        // guardar y borrar de bd resenas antiguas
        $resenasOld = resena::where('publicacion_id', '=', $publicacion->publicacion_id)->get();
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();

        $response = $this->actingAs($user)->get('/publicacion/score/' . $publicacion->publicacion_id);
        $response->assertJson(['data' => 0]);

        // borrar cambios y restaurar resenas
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();
        if (!empty($resenasOld)) {
            resena::insert($resenasOld->toArray());
        }
    }

    public function test_lista_resenas()
    {
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();

        // guardar y borrar de bd resenas antiguas
        $resenasOld = resena::where('publicacion_id', '=', $publicacion->publicacion_id)->get();
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();

        // Crear nuevos datos y testear
        $res1 = [
            'publicacion_id' => $publicacion->publicacion_id,
            'resena_califacion' => '3',
            'resena_texto' => 'ad keke',
        ];
        $res2 = [
            'publicacion_id' => $publicacion->publicacion_id,
            'resena_califacion' => '5',
            'resena_texto' => 'ad possum',
        ];

        resena::create($res1);
        resena::create($res2);
        $this->assertDatabaseHas('resenas', $res1);
        $this->assertDatabaseHas('resenas', $res2);

        $response = $this->actingAs($user)->get('/publicacion/res/' . $publicacion->publicacion_id);
        $response->assertJsonCount(2,'data');

        // borrar cambios y restaurar resenas
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();
        if (!empty($resenasOld)) {
            resena::insert($resenasOld->toArray());
        }
    }

    public function test_lista_resenas_vacia()
    {
        $user = User::factory()->create(['rol_id' => '3']);
        $tienda = tienda::where('id', '=', $user->id)->first();
        $publicacion = publicacion::where('tienda_id', '=', $tienda->tienda_id)->first();

        // guardar y borrar de bd resenas antiguas
        $resenasOld = resena::where('publicacion_id', '=', $publicacion->publicacion_id)->get();
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();

        // Testear
        $response = $this->actingAs($user)->get('/publicacion/res/' . $publicacion->publicacion_id);
        $response->assertJsonCount(0,'data');

        // borrar cambios y restaurar resenas
        resena::where('publicacion_id', '=', $publicacion->publicacion_id)->delete();
        if (!empty($resenasOld)) {
            resena::insert($resenasOld->toArray());
        }
    }
}
