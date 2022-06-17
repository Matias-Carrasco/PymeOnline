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
        //dd($producto);
        //foreach($producto['productos'] as $prod){
        //    dd($prod);
        //    $imagenes=imagen::$prod->imagen;
        //    dd($imagenes);
        //}

        //$imagenes=imagen::$producto->imagen;
        //dd($imagenes);
        $imagenes=imagen::all();
        //zdd($imagenes);
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
          "file" => "required|array",
          'file.*'=>'required|image|max:2048'
        ];
        $mensaje=[
            "producto_nombre.required"=>'El nombre del producto es requerido',
            "producto_nombre.max"=>'El nombre del producto no puede contener mas de 100 letras',
            "producto_descripcion.required"=>'La descripción del producto es requerida',
            "producto_descripcion.max"=>'La descripción del producto no puede contener mas de 1000 letras',
            "file.required"=>'La o las imagenes del producto son requeridas',
            "file.*.image"=>'El archivo debe ser tipo imagen',
            "file.max"=>'El tamaño maximo del archivo es 2 MB'
      ];
      
      $this->validate($request,$campos,$mensaje);
      $datosprod=$request->except('_token','file');
      
      $datosprod['tienda_id']= $id_tienda;
      //dd($datosprod);
      $producto = new producto;
      $producto->producto_nombre= $datosprod['producto_nombre']; 
      $producto->producto_descripcion= $datosprod['producto_descripcion']; 
      $producto->tienda_id= $id_tienda; 
      $producto->save();
      $producto_ingresado = producto::latest('producto_id')->first();

      if($request->has('file')){
        foreach($request->file('file')as $image){

            $imagen = $image->store('public/imagenes');//guarda la imagen en la carpeta del server
            $url = Storage::url($imagen);//obtiene url de la imagen guardada
            imagen::create([
                'producto_id'=>$producto_ingresado['producto_id'],
                'imagen_url'=>$url
            ]);
        }
    }
      

      //return redirect('/producto');
      return redirect('producto')->with('alert_success','Producto agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto_id)
    {
        $productos= producto::where('producto_id',$producto_id)->firstOrFail();
        $imagenes=imagen::where('producto_id',$producto_id)->get();
        
        return view('productos.show',compact('productos'),compact('imagenes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit($producto_id)
    {
        $productos= producto::where('producto_id',$producto_id)->firstOrFail();
        $imagenes=imagen::where('producto_id',$producto_id)->get();
        
        return view('productos/edit',compact('productos'),compact('imagenes'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @param  \App\Models\imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto_id)
    {
        $campos=[
            'producto_nombre'=>'required|string|max:100',
            'producto_descripcion' => 'required|string|max:1000',
            "file" => "required|array",
            'file.*'=>'required|image|max:2048'
          ];
          $mensaje=[
              "producto_nombre.required"=>'El nombre del producto es requerido',
              "producto_nombre.max"=>'El nombre del producto no puede contener mas de 100 letras',
              "producto_descripcion.required"=>'La descripción del producto es requerida',
              "producto_descripcion.max"=>'La descripción del producto no puede contener mas de 1000 letras',
              "file.required"=>'La o las imagenes del producto son requeridas',
              "file.*.image"=>'El archivo debe ser tipo imagen',
              "file.max"=>'El tamaño maximo del archivo es 2 MB'
        ];
        
        $this->validate($request,$campos,$mensaje);
        $modificar=$request->except('_token','_method','file');
        producto::where('producto_id','=',$producto_id)->update($modificar);
        
        if($request->has('file')){
            //borrar todas las imagenes anteriores
            imagen::where('producto_id', $producto_id)->delete();
            foreach($request->file('file')as $image){
    
                $imagen = $image->store('public/imagenes');//guarda la imagen en la carpeta del server
                $url = Storage::url($imagen);//obtiene url de la imagen guardada
                imagen::create([
                    'producto_id'=>$producto_id,
                    'imagen_url'=>$url
                ]);
            }
        }

        return redirect('/producto')->with('alert_success','Producto editado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_producto)
    {   
        
        producto::destroy($id_producto);
        //return redirect('/producto');
        return redirect('/producto')->with('alert_danger','Producto borrado exitosamente.');
    }
}
                                                        
