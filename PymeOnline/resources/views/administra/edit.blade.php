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
                        <label for="cliente_rut">{{'Rut de Cliente'}}</label>
                        <input type="text" name="cliente_rut" id="cliente_rut" value="{{$datosVermas->cliente_rut}}"
                            class="form-control {{$errors->has('cliente_rut')?'is-invalid':''}}">
                            {!! $errors->first('cliente_rut','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="cliente_nombre">{{'Nombre de Cliente'}}</label>
                        <input type="text" name="cliente_nombre" id="cliente_nombre" value="{{$datosVermas->cliente_nombre}}"
                            class="form-control {{$errors->has('cliente_nombre')?'is-invalid':''}}">
                            {!! $errors->first('cliente_nombre','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="cliente_apellido">{{'Apellido de Cliente'}}</label>
                        <input type="text" name="cliente_apellido" id="cliente_apellido" value="{{$datosVermas->cliente_apellido}}"
                            class="form-control {{$errors->has('cliente_apellido')?'is-invalid':''}}">
                            {!! $errors->first('cliente_apellido','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                </div>

                <div class="row">
                    <div class="col-12">
                        <a href="{{url('/admin/')}}" class="btn btn-secondary" style="margin: 10px">Volver</a>
                        <input type="submit" value="Actualizar" class="btn btn-primary float-right" style="margin: 10px">
                    </div>
                </div>

            </div>

        </section>
    </form>

@stop
