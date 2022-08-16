@extends('adminlte::page')

@section('content')
    <section class="content">

        <div class="container card">

                <div class="card-header">
                    <h3 class="card-title">Cliente</h3>
                </div>

                <div class="card-body" style="display: block;">

                    <div class="form-group">
                        <label for="tienda_id">{{'Id de Tienda'}}</label>
                        <input type="text" name="tienda_id" id="tienda_id" value="{{$datosVermas->tienda_id}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="id">{{'Id de Usuario'}}</label>
                        <input type="text" name="id" id="id" value="{{$datosVermas->id}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="estilo_id">{{'Id de Estilo'}}</label>
                        <input type="text" name="estilo_id" id="estilo_id" value="{{$datosVermas->estilo_id}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="direccion_id">{{'Id de Direccion'}}</label>
                        <input type="text" name="direccion_id" id="direccion_id" value="{{$datosVermas->direccion_id}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_nombre">{{'Nombre de Tienda'}}</label>
                        <input type="text" name="tienda_nombre" id="tienda_nombre" value="{{$datosVermas->tienda_nombre}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_numero_contacto">{{'Numero de contacto de Tienda'}}</label>
                        <input type="text" name="tienda_numero_contacto" id="tienda_numero_contacto" value="{{$datosVermas->tienda_numero_contacto}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_mail_contacto">{{'Mail de contacto de Tienda'}}</label>
                        <input type="text" name="tienda_mail_contacto" id="tienda_mail_contacto" value="{{$datosVermas->tienda_mail_contacto}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="comuna_nombre">{{'Comuna'}}</label>
                        <input type="text" name="comuna_nombre" id="comuna_nombre" value="{{$comunaTienda->comuna_nombre}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="direccion_nombre">{{'Nombre de Direccion'}}</label>
                        <input type="text" name="direccion_nombre" id="direccion_nombre" value="{{$direccionTienda->direccion_nombre}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="direccion_calle">{{'Calle de Direccion'}}</label>
                        <input type="text" name="direccion_calle" id="direccion_calle" value="{{$direccionTienda->direccion_calle}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="direccion_numero">{{'Número de Direccion'}}</label>
                        <input type="text" name="direccion_numero" id="direccion_numero" value="{{$direccionTienda->direccion_numero}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_rut_responsable">{{'Rut de Responsable'}}</label>
                        <input type="text" name="tienda_rut_responsable" id="tienda_rut_responsable" value="{{$datosVermas->tienda_rut_responsable}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_nombre_responsable">{{'Nombre de Responsable'}}</label>
                        <input type="text" name="tienda_nombre_responsable" id="tienda_nombre_responsable" value="{{$datosVermas->tienda_nombre_responsable}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_primer_apellido_responsable">{{'Primer Apellido de Responsable'}}</label>
                        <input type="text" name="tienda_primer_apellido_responsable" id="tienda_primer_apellido_responsable" value="{{$datosVermas->tienda_primer_apellido_responsable}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_segundo_apellido_responsable">{{'Segundo Apellido de Responsable'}}</label>
                        <input type="text" name="tienda_segundo_apellido_responsable" id="tienda_segundo_apellido_responsable" value="{{$datosVermas->tienda_segundo_apellido_responsable}}"
                            class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tienda_segundo_apellido_responsable">{{'Foto Carnet'}}</label>
                        <input type="text" name="tienda_segundo_apellido_responsable" id="tienda_segundo_apellido_responsable" value="{{$datosVermas->tienda_segundo_apellido_responsable}}"
                            class="form-control" readonly>
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{url('/admin/verificari')}}" class="btn btn-secondary" style="margin: 10px" >Volver</a>
                        <a href="{{url('/admin/verificarb2/'.$datosVermas->id)}}">
                            <button type="button" class="btn btn-dark float-right" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Deshabilitar" style="margin: 10px">
                                <i class="fas fa-lock"></i>
                            </button>
                        </a>
                        <a href="{{url('/admin/verificarb/'.$datosVermas->id)}}" class="btn btn-primary float-right"  style="margin: 10px" >Verificar</a>
                    </div>
                </div>

            </div>

        </section>


@stop
