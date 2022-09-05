<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\publicacion;
use App\Models\tienda;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $tienda = tienda::where('id', '=', $id)->first();
        $categorias = categoria::where('tienda_id', '=', $tienda->tienda_id)->get();
        return view('categorias.index', ['categorias' => $categorias]);
    }

    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $campos=[
        'categoria_nombre'=>'required|string|max:60|alpha_num'
    ];
    $mensaje=[
            'required'=>'El nombre es obligatorio'
    ];
    $this->validate($request, $campos,$mensaje);
        $id = Auth::id();
        $tienda = tienda::where('id', '=', $id)->first();
        $datosCategoria = request()->except('_token', 'Guardar_datos');
        $datosCategoria['tienda_id'] = $tienda->tienda_id;
        categoria::insert($datosCategoria);
        return redirect('categorias')->with('mensaje', 'Categoria agregada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($categoria_id)
    {

        $categoria = categoria::where('categoria_id', '=', $categoria_id)->firstOrFail();

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoria_id)
    {

        $modificar = $request->except(['_token', '_method', 'Guardar_datos']);
        //dd($modificar);
        categoria::where('categoria_id', '=', $categoria_id)->update($modificar);
        $categoria = categoria::where('categoria_id', '=', $categoria_id)->firstOrFail();

        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria_id)
    {
        $id = Auth::id();
        $tienda = tienda::where('id', '=', $id)->first();
        $publicaciones = publicacion::where('tienda_id', '=', $tienda->tienda_id)->where('categoria_id', '=', $categoria_id)->get();

        foreach ($publicaciones as $publicacion) {
            $publicacion['categoria_id'] = null;


            publicacion::where('publicacion_id', '=', $publicacion->publicacion_id)->update($publicacion->toArray());
        }


        categoria::where('categoria_id', '=', $categoria_id)->delete();

        return redirect('/categorias')->with('mensaje', 'Categoria borrada con exito.');
    }
}
