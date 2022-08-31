<?php

namespace App\Http\Controllers;

use App\Models\respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            "respuesta_texto" => "required|string|max:220",
          ];
        $mensaje=[
              "respuesta_texto.required"=>'La respuesta es requerida',
              "respuesta_texto.string"=>'La respuesta debe poseer numeros o letras',
              "respuesta_texto.max"=>'La respuesta no puede contener mas de 220 carácteres',
        ];
      
      $this->validate($request,$campos,$mensaje);
      $datosRespuesta= request()->except('_token');
    //   $datosPregunta['publicacion_id']=$publicacion_id;
      $datosRespuesta['respuesta_fecha']=date('y-m-d');
      respuesta::insert($datosRespuesta);
      return redirect('/publicacion')->with('alert_success', 'Respuesta realizada exitosamente.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function show(respuesta $respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\respuesta  $respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(respuesta $respuesta)
    {
        //
    }
}
