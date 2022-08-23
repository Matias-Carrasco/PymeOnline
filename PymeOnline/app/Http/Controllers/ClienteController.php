<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Show the form for creating a new resource.
         *    $datos['clientes']=cliente::paginate(5);
         *   return view('clientes.index',$datos);
         * 
         */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosCliente = request()->except('_token');
        cliente::insert($datosCliente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($cliente_id)
    {
        $cliente = cliente::findOrFail($cliente_id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cliente_id)
    {
        $datosCliente = request()->except(['_token', '_method']);

        cliente::where('cliente_id', '=', $cliente_id)->update($datosCliente);

        $cliente = cliente::FindOrFail($cliente_id);
        return view('clientes.perfil', compact('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id)
    {
        cliente::destroy($cliente_id);
        return redirect('clientes');
    }
    public function verPerfil()
    {
        $id = Auth::id();
        $cliente = cliente::where('id', '=', $id)->first();
       

        return view('clientes.perfil', compact('cliente'));
    }
}
