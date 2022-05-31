@extends('adminlte::page')

@section('title', 'Productos')

@section('content')



<form action="{{url('/producto/'.$productos->producto_id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <section class="content">

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}} </li>
                @endforeach
            </ul>

        </div>
        @endif

        <div class="container">
            <h1>Producto</h1>
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Editar producto</h3>
                </div>
                <div class="card-body" style="display: block;">



                    <div class="form-group">
                        <label for="producto_nombre">{{'Nombre producto'}}</label>
                        <input type="text" name="producto_nombre" id="producto_nombre" value="{{$productos->producto_nombre}}"
                            class="form-control {{$errors->has('producto_nombre')?'is-invalid':''}}">
                        {!! $errors->first('producto_nombre','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="producto_descripcion">Descripción del producto</label>
                        <textarea class="form-control" id="producto_descripcion" name="producto_descripcion" 
                        rows="6" onkeyup="countChars(this);"> {{$productos->producto_descripcion}}</textarea>
                        <p id="charNum"></p>

                        {!! $errors->first('producto_descripcion','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <a href="{{url('/producto')}}" class="btn btn-secondary">Cancelar</a>
                    <input type="submit" value="Editar" class="btn btn-success float-right">
                </div>
            </div>

        </div>


    </section>
</form>
@stop



@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
function countChars(obj){
    var maxLength = 1000;
    var strLength = obj.value.length;
    
    if(strLength > maxLength){
        document.getElementById("charNum").innerHTML = '<span style="color: red;">'+strLength+' de '+maxLength+' letras</span>';
    }else{
        document.getElementById("charNum").innerHTML = strLength+' de '+maxLength+' letras';
    }
}
</script>
@stop
