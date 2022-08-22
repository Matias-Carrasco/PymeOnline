<?php

namespace App\Http\Controllers;

use App\Models\publicacion;
use App\Models\resena;
use Illuminate\Http\Request;

class ResenaController extends Controller
{
    public function getList($id_publicacion)
    {
        $resenas = resena::where('publicacion_id', '=', $id_publicacion)->get();
        return json_encode(array('data' => $resenas));
    }

    public function getScore($id_publicacion)
    {
        $resenas = resena::where('publicacion_id', '=', $id_publicacion)->get();
        $promedio = 0;
        if (!$resenas->isEmpty()) {
            foreach ($resenas as $re) {
                $promedio += $re->resena_califacion;
            }
            $promedio = $promedio / count($resenas);
        }
        return json_encode(array('data' => $promedio));

    }
    
}
