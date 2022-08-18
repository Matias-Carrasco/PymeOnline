<?php

namespace App\Http\Controllers;

use App\Models\resena;
use Illuminate\Http\Request;

class ResenaController extends Controller
{

    public function getList($id)
    {
        $resenas = resena::where('publicacion_id','=',$id)->get();
        return json_encode(array('data'=>$resenas));
    }

    public function getScore($id)
    {
        $resenas = resena::where('publicacion_id','=',$id)->get();
        $promedio = 0;
        foreach ($resenas as $re) {
            $promedio += $re->resena_califacion;
        }
        return json_encode(array('data'=>$promedio / count($resenas)));
    }
    
}
