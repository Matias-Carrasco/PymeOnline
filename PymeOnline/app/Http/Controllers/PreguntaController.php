<?php

namespace App\Http\Controllers;

use App\Models\pregunta;
use App\Models\publicacion;
use Illuminate\Http\Request;

class PreguntaController extends Controller
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
     
    public function getList($id)
    {
        $preguntas = pregunta::where('publicacion_id','=',$id)->get();
        return json_encode(array('data'=>$preguntas));
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
            "pregunta_texto" => "required|string|max:220",
          ];
        $mensaje=[
              "producto_nombre.required"=>'La pregunta es requerida',
              "producto_nombre.string"=>'La pregunta debe poseer numeros o letras',
              "producto_nombre.max"=>'La pregunta no puede contener mas de 220 carácteres',
        ];
      
      $this->validate($request,$campos,$mensaje);
      $datosPregunta= request()->except('_token');
    //   $datosPregunta['publicacion_id']=$publicacion_id;
      $datosPregunta['pregunta_fecha']=date('y-m-d');
      pregunta::insert($datosPregunta);
      return redirect('/publicacion')->with('mensaje', 'Pregunta realizada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($pregunta_id)
    {
        //
        $pregunta=pregunta::findOrFail($pregunta_id);
        return view('pregunta.edit', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$pregunta_id)
    {
        //
        $campos=[
            "pregunta_texto" => "required|string|max:220",
          ];
        $mensaje=[
              "producto_nombre.required"=>'La pregunta es requerida',
              "producto_nombre.string"=>'La pregunta debe poseer numeros o letras',
              "producto_nombre.max"=>'La pregunta no puede contener mas de 220 carácteres',
        ];
      
      $this->validate($request,$campos,$mensaje);
      $datosPregunta= request()->except('_token', '_method');
      $datosPregunta['pregunta_fecha']=date('y-m-d');
      pregunta::where('pregunta_id','=',$pregunta_id)->update($datosPregunta);

      return redirect('/publicacion')->with('mensaje', 'Pregunta editada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pregunta  $pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy($pregunta_id)
    {
        //
        pregunta::destroy($pregunta_id);
        return redirect('pregunta').with('mensaje','Pregunta borrada exitosamente.');
    }
}
