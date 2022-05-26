<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\rol;
use App\Models\cliente;
use App\Models\tienda;
use App\Models\direccion;
use App\Models\comuna;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rol = rol::all();
        $usuarios = User::all();
        
        return view('administra.index',compact('usuarios'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuariosVermas = User::where('id',$id)->value('rol_id');
        if($usuariosVermas == 2){
            $datosVermas = cliente::where('id',$id)->first();
            return view('administra.show', compact('datosVermas'));
        }elseif ($usuariosVermas == 3){
            $datosVermas = tienda::where('id',$id)->first();
            $idDireccion = tienda::where('id',$id)->value('direccion_id');
            $direccionTienda = direccion::where('direccion_id',$idDireccion)->first();
            $idComuna = direccion::where('direccion_id',$idDireccion)->value('comuna_id');
            $comunaTienda = comuna::where('comuna_id',$idComuna)->first();

            $data = [];
            $data['datosVermas'] = $datosVermas;
            $data['comunaTienda'] = $comunaTienda;
            $data['direccionTienda'] = $direccionTienda;

            return view('administra.showTienda', $data);
        }        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
