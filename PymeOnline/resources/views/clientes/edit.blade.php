@extends('adminlte::page')

@section('content')
<form action="{{ url('/clientes/'.$cliente->cliente_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}






    <div class="container card">

        <div class="card-header">
            <h3 class="card-title">Perfil</h3>
        </div>

        <div class="card-body" style="display: block;">

            <div class="form-group">
                <label for="producto_nombre">{{'Nombre'}}</label>
                <input type="text" name="cliente_nombre" id="cliente_nombre" value="{{isset($cliente->cliente_nombre)?$cliente->cliente_nombre:''}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="producto_nombre">{{'Apellido'}}</label>
                <input type="text" name="cliente_apellido" id="cliente_apellido" value="{{isset($cliente->cliente_apellido)?$cliente->cliente_apellido:''}}" class="form-control">
            </div>

            <div class="form-group">
                <label for="producto_nombre">{{'Rut'}}</label>
                <input type="text" name="cliente_rut" id="cliente_rut" value="{{isset($cliente->cliente_rut)?$cliente->cliente_rut:''}}" class="form-control">
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{url('/home/')}}" class="btn btn-secondary">Cancelar</a>
                    
                        <input type="submit" value="Editar" class="btn btn-warning float-right">
                    
                    <br>
                    <br>
                </div>
            </div>

        </div>

</form>
@endsection













<!--  

<form action="{{ url('/cliente/'.$cliente->cliente_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}

    @include('clientes.form')

</form>


-->