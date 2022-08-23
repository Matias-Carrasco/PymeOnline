<?php

namespace App\Http\Controllers;
use App\Models\producto;
use App\Models\publicacion;
use Illuminate\Http\Request;
use App\Models\tienda;
use Illuminate\Support\Facades\Auth;

class PaginaTiendaController extends Controller
{
    public function index()
    {
    
        $id = Auth::id();
        $tienda = tienda::where('id', '=', $id)->first();
        $productoID=producto::where('tienda_id', '=', $tienda->tienda_id)->get();
        $publicaciones = publicacion::where('tienda_id', '=', $tienda->tienda_id)->get();
       
    //  dd($productoID);
        return view('PaginaTienda.PaginaTienda', compact('publicaciones','tienda'));
    }
}
