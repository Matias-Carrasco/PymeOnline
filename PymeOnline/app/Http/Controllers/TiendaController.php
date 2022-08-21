<?php

namespace App\Http\Controllers;

use App\Models\tienda;
use App\Models\direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Auth::id();
        // $id_tienda=tienda::where('id','=',$id)->first()->tienda_id;
        $tienda['tienda']=tienda::where('id','=',$id)->get();
        return view('tienda.index', $tienda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tienda.create');
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
        $campos=[
            'tienda_rut_responsable'=>'required|alpha_num',
            'tienda_nombre'=>'required|string|max:30',
            'tienda_nombre_responsable'=>'required|string|max:20',
            'tienda_primer_apellido_responsable'=>'required|string|max:20',
            'tienda_segundo_apellido_responsable'=>'required|string|max:20',
            'tienda_numero_contacto' => 'required|alpha_dash',
            'tienda_mail_contacto'=>'required|email'

        ];
        $mensaje=[
            "tienda_numero_contacto.required"=>'El Número de Contacto es requerido',
            "tienda_numero_contacto.alpha_dash"=>'El Número de Contacto debe poseer números, letras o guiones',
            "tienda_mail_contacto.required"=>'El Mail es requerido',
            "tienda_mail_contacto.email"=>'El Mail no es valido',
            "tienda_rut_responsable.required"=>'El Rut del Responsable es requerido',
            "tienda_rut_responsable.alpha"=>'El Rut del Responsable debe poseer números o letras',
            "tienda_nombre.required"=>'El Nombre de la Tienda es requerido',
            "tienda_nombre.alpha"=>'El Nombre de la Tienda sólo debe tener letras',
            "tienda_nombre.max"=>"El Nombre de la Tienda es demasiado largo",
            "tienda_nombre_responsable.required"=>'El Nombre del Responsable es requerido',
            "tienda_nombre_responsable.alpha"=>'El Nombre del Responsable sólo debe tener letras',
            "tienda_nombre_responsable.max"=>"El Nombre del Responsable es demasiado largo",
            "tienda_primer_apellido_responsable.required"=>'El Primer Apellido del Responsable es requerido',
            "tienda_primer_apellido_responsable.max"=>"El Primer Apellido es demasiado largo",
            "tienda_primer_apellido_responsable.alpha"=>'El Primer Apellido del Responsable sólo debe tener letras',
            "tienda_segundo_apellido_responsable.required"=>'El Segundo Apellido del Responsable es requerido',
            "tienda_segundo_apellido_responsable.alpha"=>'El Segundo Apellido del Responsable sólo debe tener letras',
            "tienda_segundo_apellido_responsable.max"=>"El Segundo Apellido es demasiado largo",
        ];
        $this->validate($request, $campos, $mensaje);

        $datosTienda = request()-> except('_token'); 
        $datosTienda['id']= Auth::id();
        $datosTienda['estilo_id']= 1;
        $datosTienda['direccion_id']= 1;
        tienda::insert($datosTienda);
        // return response()->json($datosTienda);
        return redirect('tienda')->with('mensaje', 'Tienda creata con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function show(tienda $tienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function edit($tienda_id)
    {
        //
        $perfil=tienda::findOrFail($tienda_id);
        return view('tienda.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tienda_id)
    {
        $campos=[
            'tienda_rut_responsable'=>'required|alpha_num',
            'tienda_nombre'=>'required|string|max:30',
            'tienda_nombre_responsable'=>'required|string|max:20',
            'tienda_primer_apellido_responsable'=>'required|string|max:20',
            'tienda_segundo_apellido_responsable'=>'required|string|max:20',
            'tienda_numero_contacto' => 'required|alpha_dash',
            'tienda_mail_contacto'=>'required|email'

        ];
        $mensaje=[
            "tienda_numero_contacto.required"=>'El Número de Contacto es requerido',
            "tienda_numero_contacto.alpha_dash"=>'El Número de Contacto debe poseer números, letras o guiones',
            "tienda_mail_contacto.required"=>'El Mail es requerido',
            "tienda_mail_contacto.email"=>'El Mail no es valido',
            "tienda_rut_responsable.required"=>'El Rut del Responsable es requerido',
            "tienda_rut_responsable.alpha"=>'El Rut del Responsable debe poseer números o letras',
            "tienda_nombre.required"=>'El Nombre de la Tienda es requerido',
            "tienda_nombre.alpha"=>'El Nombre de la Tienda sólo debe tener letras',
            "tienda_nombre.max"=>"El Nombre de la Tienda es demasiado largo",
            "tienda_nombre_responsable.required"=>'El Nombre del Responsable es requerido',
            "tienda_nombre_responsable.alpha"=>'El Nombre del Responsable sólo debe tener letras',
            "tienda_nombre_responsable.max"=>"El Nombre del Responsable es demasiado largo",
            "tienda_primer_apellido_responsable.required"=>'El Primer Apellido del Responsable es requerido',
            "tienda_primer_apellido_responsable.max"=>"El Primer Apellido es demasiado largo",
            "tienda_primer_apellido_responsable.alpha"=>'El Primer Apellido del Responsable sólo debe tener letras',
            "tienda_segundo_apellido_responsable.required"=>'El Segundo Apellido del Responsable es requerido',
            "tienda_segundo_apellido_responsable.alpha"=>'El Segundo Apellido del Responsable sólo debe tener letras',
            "tienda_segundo_apellido_responsable.max"=>"El Segundo Apellido es demasiado largo",
        ];
          //
        $this->validate($request, $campos, $mensaje);
        $datosTienda =($request)-> except(['_token','_method']);
        tienda::where('tienda_id','=',$tienda_id)->update($datosTienda);

        
        return redirect('/tienda')->with('mensaje', 'Tienda editada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tienda  $tienda
     * @return \Illuminate\Http\Response
     */
    public function destroy($tienda_id)
    {
        //
        tienda::destroy($tienda_id);
        return redirect('tienda')->with('mensaje','Tienda borrada exitosamente.');
    }
}
