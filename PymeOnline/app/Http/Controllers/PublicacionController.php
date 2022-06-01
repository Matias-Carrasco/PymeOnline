<?php

namespace App\Http\Controllers;

use App\Models\publicacion;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\tienda;
use App\Models\categoria;
use Illuminate\Support\Facades\Auth;


class PublicacionController extends Controller
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
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $data['producto']=producto::where('tienda_id','=',$id_tienda)->get();
        $cat['categorias']=categoria::all();

        
        return view('Publicaciones/create',$data,$cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd("entre");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show(publicacion $publicacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit(publicacion $publicacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, publicacion $publicacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(publicacion $publicacion)
    {
        //
    }
}
