<?php

namespace App\Http\Controllers;

use App\Models\tag;
use App\Models\tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    
    public function index()
    {
        $id = Auth::id();
        $id_tienda = tienda::where('id','=',$id)->first()->tienda_id;

        $tags = tag::where('tienda_id','=',$id_tienda)->get();

        return view('tags.index',['tags'=>$tags]);
    }


    public function create()
    {
        return view('tags.create');
    }


    public function store(Request $request)
    {
        $id = Auth::id();
        $id_tienda = tienda::where('id','=',$id)->first()->tienda_id;

        $camposTags=[
            'tag_nombre' => 'required|string|max:32',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'tag_nombre.required' => 'El nombre para el tag es requerido',
        ];

        // Se validan los campos y se mostraran los mensajes
        $this->validate($request, $camposTags, $mensaje);

        // Dropea el token e inserta los datos
        $datosTag = request()->except(['_token','_method']);
        $datosTag['tienda_id'] = $id_tienda;
        tag::insert($datosTag);

        return redirect('tags')->with('alert_success','Tag agregado exitosamente.');
    }


    public function show(tag $tag)
    {
        //
    }

    
    public function edit($tag_id)
    {
        $tag = tag::where('tag_id', '=', $tag_id)->firstOrFail();
        
        //TODO remover esto y pasar solo los tags asociados a la tienda
        $tiendas = tienda::all();

        return view('tags.edit', ['tag'=>$tag,'tiendas'=>$tiendas]); //se pasan los datos del formulario
    }

    
    public function update(Request $request, $tag_id)
    {
        $id = Auth::id();
        $id_tienda = tienda::where('id','=',$id)->first()->tienda_id;

        $camposTags=[
            'tag_nombre' => 'required|string|max:32',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'tag_nombre.required' => 'El nombre para el tag es requerido',
        ];

        // Se validan los campos y se mostraran los mensajes
        $this->validate($request, $camposTags, $mensaje);
        
        // Dropea el token e inserta los datos
        $datosTag = request()->except(['_token','_method']);
        $datosTag['tienda_id'] = $id_tienda;
        tag::where("tag_id","=",$tag_id)->update($datosTag);

        return redirect('tags')->with('alert_success','Tag editado exitosamente.');
    }

    
    public function destroy($tag_id)
    {
        $tag = tag::where('tag_id','=',$tag_id)->delete();
        return redirect('tags')->with('mensaje', 'Tag eliminada');

    }
}
