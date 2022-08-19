<?php

namespace App\Http\Controllers;

use App\Models\tienda;
use App\Models\direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $tienda['tienda']=tienda::where('tienda_id','=',$id_tienda)->get();
        return view('tienda.index', $tienda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tienda.create');
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
        $datosTienda = request()-> except('_token');
        tienda::insert($datosTienda);
        return response()->json($datosTienda);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show(tienda $tienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit($tienda_id)
    {
        //
        $perfil=tienda::findOrFail($tienda_id);
        return view('tienda.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tienda_id)
    {
        //
        $datosTienda = request()-> except(['_token','_method']);
        tienda::where('tienda_id','=',$tienda_id)->update($datosTienda);

        
        return redirect('tienda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy($tienda_id)
    {
        //
        tienda::destroy($tienda_id);
        return redirect('tienda')->with('alert_danger','Producto borrado exitosamente.');;
    }
}
