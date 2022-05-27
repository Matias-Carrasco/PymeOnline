<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\tienda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //$datos['productos']= producto::all();//productos es el nombre de la tabla, producto es el modelo
        return view('productos.index',$producto);

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
          'producto_nombre'=>'required|string',
          'producto_descripcion' => 'required|string|'
        ];
        $mensaje=[
            "producto_nombre.required"=>'El nombre del producto es requerido',
            "producto_descripcion.required"=>'La descripción del producto es requerida',
      ];

      $this->validate($request,$campos,$mensaje);
      $datosprod=$request->except('_token');

      $datosprod['tienda_id'] = $id_tienda;

      producto::insert($datosprod);
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
            'producto_nombre'=>'required|string',
            'producto_descripcion' => 'required|string|'
          ];
          $mensaje=[
              "producto_nombre.required"=>'El nombre del producto es requerido',
              "producto_descripcion.required"=>'La descripción del producto es requerida',
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
                                                        