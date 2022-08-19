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
        $tiendaID = tienda::where('id','=',$id)->first()->tienda_id;

        $subqueryConteoTags =   tag::where('tienda_id','=',$tiendaID)
                                ->join('tag_publicaciones','tags.tag_id','=','tag_publicaciones.tag_id')
                                ->selectRaw('tag_publicaciones.tag_id, COUNT(*) as count')
                                ->groupBy('tag_publicaciones.tag_id');

        $tags = tag::where('tienda_id','=',$tiendaID)
                ->leftJoinSub($subqueryConteoTags, 'conteo_tags', function($join){
                    $join->on('tags.tag_id', '=', 'conteo_tags.tag_id');
                })
                ->select('tags.tag_id','tags.tag_nombre','count')
                ->get();
        
        return view('tags.index',['tags'=>$tags]);
    }

    public function store(Request $request)
    {
        $id = Auth::id();
        $tiendaID = tienda::where('id','=',$id)->first()->tienda_id;

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
        $datosTag['tienda_id'] = $tiendaID;
        tag::insert($datosTag);

        return redirect('tags')->with('alert_success','Tag agregado exitosamente.');
    }
    
    public function update(Request $request, $tag_id)
    {
        $id = Auth::id();
        $tiendaID = tienda::where('id','=',$id)->first()->tienda_id;

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
        $datosTag['tienda_id'] = $tiendaID;
        tag::where("tag_id","=",$tag_id)->update($datosTag);

        return redirect('tags')->with('alert_success','Tag editado exitosamente.');
    }

    
    public function destroy($tag_id)
    {
        $tag = tag::where('tag_id','=',$tag_id)->delete();
        return redirect('tags')->with('mensaje', 'Tag eliminada');

    }
}
