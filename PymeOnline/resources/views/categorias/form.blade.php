@extends('adminlte::page')

@section('title', 'Categoria')



@section('content')
<!--
<h1>{{$modo}} categoria</h1>
<label for="categoria_nombre">Nombre categoria </label>
<input type="text" name="categoria_nombre" value="{{isset($categoria->categoria_nombre)?$categoria->categoria_nombre:''}}" id="categoria_nombre">
<br>
<input type="submit" value="{{$modo}} categoria">
<a href="{{url ('/categorias/')}}">
    Regresar

</a>
<br> -->
<section class="content">
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>




            @foreach($errors->all() as $error)
            <li>{{$error}} </li>
            @endforeach
        </ul>
    </div>
    @endif

    <h1>{{$modo}} categoría</h1>
    <div class="card card-primary">


        <div class="card-body" style="display: block;">
            @include('common.alerts')

            <div class="form-group">
                <label for="categoria_nombre">{{'Nombre categoría'}}</label>
                <input type="text" name="categoria_nombre" id="categoria_nombre" value="{{isset($categoria->categoria_nombre)?$categoria->categoria_nombre:''}}">

            </div>



            <div class="row">
                <div class="col-12">
                    <a href="{{url('/categorias/')}}" class="btn btn-secondary">Cancelar</a>

                    <input type="submit" value="{{$modo}}" class="btn btn-success float-right">

                </div>
            </div>
        </div>
    </div>





</section>
@endsection