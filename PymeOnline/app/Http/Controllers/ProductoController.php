<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\imagen;
use App\Models\tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $producto['productos']=producto::where('tienda_id','=',$id_tienda)->get();
        
        $imagenes=imagen::all();
        //$datos['productos']= producto::all();//productos es el nombre de la tabla, producto es el modelo
        return view('productos.index',$producto,compact('imagenes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $productos=producto::all();
        return view('productos/create',compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $campos=[
          'producto_nombre'=>'required|string|max:100',
          'producto_descripcion' => 'required|string|max:1000',
          'file'=>'required|image|max:2048'
        ];
        $mensaje=[
            "producto_nombre.required"=>'El nombre del producto es requerido',
            "producto_descripcion.required"=>'La descripción del producto es requerida',
            "producto_descripcion.max"=>'La descripción del producto no puede contener mas de 1000 letras',
            "file.required"=>'La imagen del producto es requerida',
            "file.image"=>'El archivo debe ser tipo imagen',
            "file.max"=>'El tamaño maximo del archivo es 2 MB'
      ];

      $this->validate($request,$campos,$mensaje);
      $datosprod=$request->except('_token','file');
      $imagen = $request->file('file')->store('public/imagenes');//guarda la imagen en la carpeta del server
      $url = Storage::url($imagen);//obtiene url de la imagen guardada
      
      //$datosprod['tienda_id'] = $id_tienda;
      
      $producto = new producto;
      $producto->producto_nombre= $datosprod['producto_nombre']; 
      $producto->producto_descripcion= $datosprod['producto_descripcion']; 
      $producto->tienda_id= $id_tienda; 
      $producto->save();

      //producto::insert($datosprod);
      $ultimo_id = $producto->producto_id;//obtiene el id del producto guardado en bd

      $img = new imagen;
      $img->imagen_url = $url;
      $img->producto_id = $ultimo_id;

      $img->save();

      return redirect('/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto_id)
    {
        $productos=producto::where('producto_id',$producto_id)->first();
        
        return view('productos/edit',compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto_id)
    {
        $campos=[
            'producto_nombre'=>'required|string|max:100',
            'producto_descripcion' => 'required|string|max:1000'
          ];
          $mensaje=[
              "producto_nombre.required"=>'El nombre del producto es requerido',
              "producto_descripcion.required"=>'La descripción del producto es requerida',
              "producto_descripcion.max"=>'La descripción del producto no puede contener mas de 1000 letras',
        ];
  
        $this->validate($request,$campos,$mensaje);
        $modificar=$request->except('_token','_method');
        producto::where('producto_id','=',$producto_id)->update($modificar);
        return redirect('/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($producto_id)
    {   
        producto::destroy($producto_id);
        return redirect('/producto');
    }
}
                                                        
