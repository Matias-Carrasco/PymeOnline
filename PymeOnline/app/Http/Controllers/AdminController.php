<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\rol;
use App\Models\cliente;
use App\Models\tienda;
use App\Models\direccion;
use App\Models\comuna;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rol = rol::all();
        $usuarios = User::all();

        return view('administra.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuariosVermas = User::where('id',$id)->value('rol_id');
        if($usuariosVermas == 2){
            $datosVermas = cliente::where('id',$id)->first();
            return view('administra.show', compact('datosVermas'));
        }elseif ($usuariosVermas == 3){
            $datosVermas = tienda::where('id',$id)->first();
            $idDireccion = tienda::where('id',$id)->value('direccion_id');
            $direccionTienda = direccion::where('direccion_id',$idDireccion)->first();
            $idComuna = direccion::where('direccion_id',$idDireccion)->value('comuna_id');
            $comunaTienda = comuna::where('comuna_id',$idComuna)->first();

            $data = [];
            $data['datosVermas'] = $datosVermas;
            $data['comunaTienda'] = $comunaTienda;
            $data['direccionTienda'] = $direccionTienda;

            return view('administra.showTienda', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuariosVermas = User::where('id',$id)->value('rol_id');
        if($usuariosVermas == 2){
            $datosVermas = cliente::where('id',$id)->first();
            return view('administra.edit', compact('datosVermas'));
        }elseif ($usuariosVermas == 3){
            $datosVermas = tienda::where('id',$id)->first();

            $data = [];
            $data['datosVermas'] = $datosVermas;
            return view('administra.editTienda', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $usuariosVermas = User::where('id',$id)->value('rol_id');
        if($usuariosVermas == 2){

            $campos=[
                'cliente_rut' => 'required|alpha_num',
                'cliente_nombre' => 'required|alpha',
                'cliente_apellido' => 'required|alpha'
            ];
            $mensaje=[
                "cliente_rut.required"=>'El Rut es requerido',
                "cliente_rut.alpha_num"=>'El Rut debe poseer numeros o letras',
                "cliente_nombre.required"=>'El Nombre es requerido',
                "cliente_nombre.alpha"=>'El Nombre debe poseer solo letras',
                "cliente_apellido.required"=>'El Apellido es requerido',
                "cliente_apellido.alpha"=>'El Apellido debe poseer solo letras',
            ];

            $this->validate($request,$campos,$mensaje);
            $modificar=$request->except('_token','_method');
            cliente::where('id','=',$id)->update($modificar);
            return redirect('/admin');

        }elseif ($usuariosVermas == 3){
            $campos=[
                'tienda_numero_contacto' => 'required|alpha_dash',
                'tienda_mail_contacto' => 'required|email',
                'tienda_rut_responsable' => 'required|alpha_num',
                'tienda_nombre_responsable' => 'required|alpha',
                'tienda_primer_apellido_responsable' => 'required|alpha',
                'tienda_segundo_apellido_responsable' => 'required|alpha',
            ];
            $mensaje=[
                "tienda_numero_contacto.required"=>'El Número de Contacto es requerido',
                "tienda_numero_contacto.alpha_dash"=>'El Número de Contacto debe poseer números, letras o guiones',
                "tienda_mail_contacto.required"=>'El Mail es requerido',
                "tienda_mail_contacto.email"=>'El Mail no es valido',
                "tienda_rut_responsable.required"=>'El Rut del Responsable es requerido',
                "tienda_rut_responsable.alpha"=>'El Rut del Responsable debe poseer números o letras',
                "tienda_nombre_responsable.required"=>'El Nombre del Responsable es requerido',
                "tienda_nombre_responsable.alpha"=>'El Nombre del Responsable debe poseer solo letras',
                "tienda_primer_apellido_responsable.required"=>'El Primer Apellido del Responsable es requerido',
                "tienda_primer_apellido_responsable.alpha"=>'El Primer Apellido del Responsable debe poseer solo letras',
                "tienda_segundo_apellido_responsable.required"=>'El Segundo Apellido del Responsable es requerido',
                "tienda_segundo_apellido_responsable.alpha"=>'El Segundo Apellido del Responsable debe poseer solo letras',
            ];

            $this->validate($request,$campos,$mensaje);
            $modificar=$request->except('_token','_method');
            tienda::where('id','=',$id)->update($modificar);
            return redirect('/admin');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function banear($id)
    {
        $usuario = User::find($id);
        if($usuario->baneado == 1){
            abort(404, "El Usuario ya esta baneado");
        }else{
            $usuario->baneado = 1;
            $usuario->save();
            return redirect('/admin');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function desbanear($id)
    {
        $usuario = User::find($id);
        if($usuario->baneado == 0){
            abort(404, "El Usuario ya esta baneado");
        }else{
            $usuario->baneado = 0;
            $usuario->save();
            return redirect('/admin');
        }

    }

    public function verificari(){
        $rol = rol::all();
        $tiendas = tienda::where('verificado',0)->get('id');
        $usuarios = User::whereIn('id', $tiendas)->get();

        return view('administra.verificar.index',compact('usuarios'));
    }

    public function verificare($id){
        $datosVermas = tienda::where('id',$id)->first();
        $idDireccion = tienda::where('id',$id)->value('direccion_id');
        $direccionTienda = direccion::where('direccion_id',$idDireccion)->first();
        $idComuna = direccion::where('direccion_id',$idDireccion)->value('comuna_id');
        $comunaTienda = comuna::where('comuna_id',$idComuna)->first();

        $data = [];
        $data['datosVermas'] = $datosVermas;
        $data['comunaTienda'] = $comunaTienda;
        $data['direccionTienda'] = $direccionTienda;
            return view('administra.verificar.edit', $data);
    }

    public function verificarb($id){
        $tienda = tienda::where('id',$id)->first();
         if($tienda->verificado == 1){
             abort(404, "El Usuario ya esta verificado");
         }else{
             $tienda->verificado = 1;
             $tienda->save();
             return redirect('/admin/verificari');
         }
    }
    
    public function deverificarb($id){
        $tienda = tienda::where('id',$id)->first();
         if($tienda->verificado == 0){
             abort(404, "El Usuario ya esta desverificado");
         }else{
             $tienda->verificado = 0;
             $tienda->save();
             return redirect('/admin/verificari');
         }
    }


    public function verificarb2($id){
        $usuario = User::find($id);
        if($usuario->baneado == 1){
            abort(404, "El Usuario ya esta baneado");
        }else{
            $tienda = tienda::where('id',$id)->first();
            $tienda->verificado = 1;
            $tienda->save();
            $usuario->baneado = 1;
            $usuario->save();
            return redirect('/admin/verificari');
        }
    }
}
