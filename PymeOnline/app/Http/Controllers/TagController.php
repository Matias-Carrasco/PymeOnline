<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    
    public function index()
    {
        $tags = tag::paginate(50);
        return view('tags.index',['tags'=>$tags]);
    }


    public function create()
    {
        return view('tags.create');
    }


    public function store(Request $request)
    {
        $camposTags=[
            'tienda_id' => 'required|int',
            'tag_nombre' => 'required|string|max:32',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'tienda_id.required' => 'El identificador de la tienda no es valido',
            'tag_nombre.required' => 'El nombre para el tag es requerido',
        ];

        // Se validan los campos y se mostraran los mensajes
        $this->validate($request, $camposTags, $mensaje);

        // Dropea el token e inserta los datos
        $datosTag = request()->except(['_token','_method']);
        tag::insert($datosTag);

        return redirect('tag')->with('mensaje','Tag agregado exitosamente.');
    }


    public function show(tag $tag)
    {
        //
    }

    
    public function edit($tag_id)
    {
        $tag = tag::where('tag_id', '=', $tag_id)->firstOrFail();
        return view('tags.edit', ['tag']); //se pasan los datos del formulario
    }

    
    public function update(Request $request, $tag_id)
    {
        $camposTags=[
            'tienda_id' => 'required|int',
            'tag_nombre' => 'required|string|max:32',
        ];

        $mensaje = [
            'required'=>'El :attribute es requerido',
            'tienda_id.required' => 'El identificador de la tienda no es valido',
            'tag_nombre.required' => 'El nombre para el tag es requerido',
        ];

        // Se validan los campos y se mostraran los mensajes
        $this->validate($request, $camposTags, $mensaje);
        
        // Dropea el token e inserta los datos
        $datosTag = request()->except(['_token','_method']);
        tag::where("tag_id","=",$tag_id)->update($datosTag);

        return redirect('tag')->with('mensaje','Tag agregado exitosamente.');
    }

    
    public function destroy($tag_id)
    {
        $tag = tag::where('tag_id','=',$tag_id)->delete();
        return redirect('tags')->with('mensaje', 'Tag eliminada');

    }
}
