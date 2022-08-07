@extends('adminlte::page')

@section('title', 'Crear producto')

@section('content')


<form action="{{url('/producto')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
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

        
            <h1>Crear producto</h1>
            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos del producto</h3>
                </div>

                <div class="card-body" style="display: block;">
                    @include('common.alerts')

                    <div class="form-group">
                        <label for="producto_nombre">{{'Nombre producto'}}</label>
                        <input type="text" name="producto_nombre" id="producto_nombre"
                            value="{{isset($productos->producto_nombre)?$productos->producto_nombre:old('producto_nombre')}}"
                            class="form-control {{$errors->has('producto_nombre')?'is-invalid':''}}">
                        {!! $errors->first('producto_nombre','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="producto_descripcion">Descripción del producto</label>
                        <textarea class="form-control" id="producto_descripcion" name="producto_descripcion"
                            rows="6" onkeyup="countChars(this);"></textarea>
                        <p id="charNum">0 letras</p>

                        {!! $errors->first('producto_descripcion','<div class="invalid-feedback"> :message</div>') !!}
                    </div>

                    <div class="grid grid-cols-1 mt-5 mx-7">
                        <img id="imagenSeleccionada" style="max-height: 300px;">
                    </div>

                    <div class="form-group">
                        <label for="files">Subir imagenes</label>
                        <br>
                        <input class="form-control" type="file" id="file" name="file[]" accept="image/*" multiple>
                        @error('file')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <a href="{{url('/producto')}}" class="btn btn-secondary">Cancelar</a>
        
                            <input type="submit" value="Agregar" class="btn btn-success float-right">
                            
                        </div>
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

<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script>   
    $(document).ready(function (e) {   
        $('#file').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>



@stop
