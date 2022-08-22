<?php

namespace App\Http\Controllers;

use App\Models\tienda;
use App\Models\publicacion;
use Illuminate\Http\Request;

class VistaClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show($tienda)
    {
        $data['tienda']=tienda::find($tienda);
        $data['publicaciones']=publicacion::where('tienda_id',$data['tienda']->tienda_id)->get();
        return view('vistaClientes/index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit(tienda $tienda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tienda $tienda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy(tienda $tienda)
    {
        //
    }
}
