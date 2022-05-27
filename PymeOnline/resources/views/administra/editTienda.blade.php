@extends('adminlte::page')

@section('content')
<form action="{{url('/admin/'.$datosVermas->id)}}" method="post" enctype=" multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <section class="content">

        <div class="container card">

                <div class="card-header">
                    <h3 class="card-title">Cliente</h3>
                </div>

                <div class="card-body" style="display: block;">

                    <div class="form-group">
                        <label for="tienda_numero_contacto">{{'Número de contacto de Tienda'}}</label>
                        <input type="text" name="tienda_numero_contacto" id="tienda_numero_contacto" value="{{$datosVermas->tienda_numero_contacto}}"
                            class="form-control {{$errors->has('tienda_numero_contacto')?'is-invalid':''}}">
                            {!! $errors->first('tienda_numero_contacto','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
        
                    <div class="form-group">
                        <label for="tienda_mail_contacto">{{'Mail de contacto de Tienda'}}</label>
                        <input type="text" name="tienda_mail_contacto" id="tienda_mail_contacto" value="{{$datosVermas->tienda_mail_contacto}}"
                            class="form-control {{$errors->has('tienda_mail_contacto')?'is-invalid':''}}">
                            {!! $errors->first('tienda_mail_contacto','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="tienda_rut_responsable">{{'Rut de Responsable'}}</label>
                        <input type="text" name="tienda_rut_responsable" id="tienda_rut_responsable" value="{{$datosVermas->tienda_rut_responsable}}"
                            class="form-control {{$errors->has('tienda_rut_responsable')?'is-invalid':''}}">
                            {!! $errors->first('tienda_rut_responsable','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
        
                    <div class="form-group">
                        <label for="tienda_nombre_responsable">{{'Nombre de Responsable'}}</label>
                        <input type="text" name="tienda_nombre_responsable" id="tienda_nombre_responsable" value="{{$datosVermas->tienda_nombre_responsable}}"
                            class="form-control {{$errors->has('tienda_nombre_responsable')?'is-invalid':''}}">
                            {!! $errors->first('tienda_nombre_responsable','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
        
                    <div class="form-group">
                        <label for="tienda_primer_apellido_responsable">{{'Primer Apellido de Responsable'}}</label>
                        <input type="text" name="tienda_primer_apellido_responsable" id="tienda_primer_apellido_responsable" value="{{$datosVermas->tienda_primer_apellido_responsable}}"
                            class="form-control {{$errors->has('tienda_primer_apellido_responsable')?'is-invalid':''}}">
                            {!! $errors->first('tienda_primer_apellido_responsable','<div class="invalid-feedback"> :message</div>') !!}
                    </div>
        
                    <div class="form-group">
                        <label for="tienda_segundo_apellido_responsable">{{'Segundo Apellido de Responsable'}}</label>
                        <input type="text" name="tienda_segundo_apellido_responsable" id="tienda_segundo_apellido_responsable" value="{{$datosVermas->tienda_segundo_apellido_responsable}}"
                            class="form-control {{$errors->has('tienda_segundo_apellido_responsable')?'is-invalid':''}}">
                            {!! $errors->first('tienda_segundo_apellido_responsable','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                

                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{url('/admin/')}}" class="btn btn-primary" >Volver</a>
                        <input type="submit" value="Editar" class="btn btn-success float-right">
                        <br>
                        <br>
                    </div>
                </div>

            </div>

        </section>
    </form>

@stop