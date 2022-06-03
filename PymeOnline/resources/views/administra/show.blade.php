@extends('adminlte::page')

@section('content')
  <div class="container card">

        <div class="card-header">
            <h3 class="card-title">Cliente</h3>
        </div>

        <div class="card-body" style="display: block;">

            <div class="form-group">
                <label for="cliente_id">{{'Id de Cliente'}}</label>
                <input type="text" name="cliente_id" id="cliente_id" value="{{$datosVermas->cliente_id}}"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="id">{{'Id de Usuario'}}</label>
                <input type="text" name="id" id="id" value="{{$datosVermas->id}}"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="cliente_rut">{{'Rut de Cliente'}}</label>
                <input type="text" name="cliente_rut" id="cliente_rut" value="{{$datosVermas->cliente_rut}}"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="cliente_nombre">{{'Nombre de Cliente'}}</label>
                <input type="text" name="cliente_nombre" id="cliente_nombre" value="{{$datosVermas->cliente_nombre}}"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="cliente_apellido">{{'Apellido de Cliente'}}</label>
                <input type="text" name="cliente_apellido" id="cliente_apellido" value="{{$datosVermas->cliente_apellido}}"
                    class="form-control" readonly>
            </div>



        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{url('/admin/')}}" class="btn btn-secondary" >Volver</a>
                <a href="{{url('/admin/'.$datosVermas->id.'/edit')}}">
                    <input type="submit" value="Editar" class="btn btn-warning float-right">
                </a>
                <br>
                <br>
            </div>
        </div>

    </div>

@stop
