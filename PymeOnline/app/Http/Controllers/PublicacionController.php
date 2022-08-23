<?php

namespace App\Http\Controllers;

use App\Models\publicacion;
use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\tienda;
use App\Models\categoria;
use App\Models\imagen;
use Illuminate\Support\Facades\Auth;


class PublicacionController extends Controller
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
        $dataPubli['publicaciones']=publicacion::where('tienda_id','=',$id_tienda)->get();
        
        return view('Publicaciones/index',$dataPubli);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $data['producto']=producto::where('tienda_id','=',$id_tienda)->get();
        $cat['categorias']=categoria::all();

        
        return view('Publicaciones/create',$data,$cat);
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
            'producto_id'=>'required|numeric',
            'categoria_id'=>'required|numeric',
            'publicacion_titulo'=> 'required|string|max:100',
            'publicacion_precio'=> 'required|numeric',
            'publicacion_oferta_porcentual'=> 'required|numeric'
        ];
        
        
        $Mensaje=[
            "producto_id.required"=>'Debe seleccionar una producto',
            "categoira_id.required"=>'Debe seleccionar una categoria',
            "publicacion_titulo.required"=>'Debe ingresar un titulo',
            "publicacion_precio.required"=>'Debe ingresar un precio',
            "publicacion_oferta_porcentual.required"=>'Debe ingresar un valor en caso de no querer aplicar oferta ingrese 0'
            

           
        ];
        $this->validate($request,$campos,$Mensaje);

        $datospublicacion=$request->except('_token');
        $datospublicacion['tienda_id']= $id_tienda;
        $datospublicacion['pulicacion_activo']= 1;

        //dd($datospublicacion);
    


        publicacion::insert($datospublicacion);
        return redirect('/publicacion');  
      
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function show( $publicacion_id)
    {

        $publicacion=publicacion::find($publicacion_id);
        $productos=producto::find($publicacion->producto_id);
        $productos['imagenes']=imagen::where('producto_id',$publicacion_id)->get();


        return view('Publicaciones/show',compact('publicacion'),compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function edit($publicacion_id)
    {
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $data['producto']=producto::where('tienda_id','=',$id_tienda)->get();
        $data['categorias']=categoria::all();
        $data['publicacion']=$publicacion=publicacion::find($publicacion_id);
        $data['productoPublicacion']=producto::find($data['publicacion']->producto_id);
        $data['categoria']=categoria::where('categoria_id','=',$data['publicacion']->categoria_id)->firstOrFail();
       // dd($data['categoria']);
        return view('Publicaciones/edit',$data);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$publicacion_id)
    {
        
        $id = Auth::id();
        $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $campos=[
            'producto_id'=>'required|numeric',
            'categoria_id'=>'required|numeric',
            'publicacion_titulo'=> 'required|string|max:100',
            'publicacion_precio'=> 'required|numeric',
            'publicacion_oferta_porcentual'=> 'required|numeric'
        ];
        
        
        $Mensaje=[
            "producto_id.required"=>'Debe seleccionar una producto',
            "categoira_id.required"=>'Debe seleccionar una categoria',
            "publicacion_titulo.required"=>'Debe ingresar un titulo',
            "publicacion_precio.required"=>'Debe ingresar un precio',
            "publicacion_oferta_porcentual.required"=>'Debe ingresar un valor en caso de no querer aplicar oferta ingrese 0'
            

           
        ];
        $this->validate($request,$campos,$Mensaje);

        $datospublicacion=$request->except('_token','_method');
        $datospublicacion['tienda_id']= $id_tienda;
 
        publicacion::where('publicacion_id',$publicacion_id)->update($datospublicacion);
        return redirect('/publicacion');  
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publicacion  $publicacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($publicacion_id)
    {  
        publicacion::where('publicacion_id',$publicacion_id)->update(array('pulicacion_activo'=>0));
        return redirect('/publicacion')->with('alert_danger','Publicacion desactivada');

    }
}
