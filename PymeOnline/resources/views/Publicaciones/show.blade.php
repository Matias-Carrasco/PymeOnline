@extends('adminlte::page')

@section('content')
  <div class="container card">

        <div class="card-header">
            <h3 class="card-title">Publicacion  {{$publicacion->publicacion_id}}</h3>
        </div>

        <div class="card-body" style="display: block;">

            <div class="form-group">
                <label for="producto_nombre">{{'Titulo Publicacion'}}</label>
                <input type="text" name="publicacion_titulo" id="publicacion_titulo" value="{{$publicacion->publicacion_titulo}}"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="producto_nombre">{{'Precio'}}</label>
                <input type="text" name="publicacion_titulo" id="publicacion_titulo" value="{{$publicacion->publicacion_precio}}"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="producto_nombre">{{'Nombre producto'}}</label>
                <input type="text" name="producto_nombre" id="producto_nombre" value="{{$productos->producto_nombre}}"
                    class="form-control" readonly>
            </div>

            
            <div class="form-group">
                <label for="producto_descripcion">Descripción del producto</label>
                <textarea class="form-control" readonly id="producto_descripcion" name="producto_descripcion" 
                        rows="6" onkeyup="countChars(this);"> {{$productos->producto_descripcion}}</textarea>
                
            </div>

            <div class="form-group">
                <label for="files">Imagenes</label>
                <p>Actualmente tiene seleccionadas x imagenes</p>
                @foreach ($productos->imagenes as $img)
                 
                    <img src="{{$img->imagen_url}}" width="30%">
                    
                @endforeach
                
            </div>

        

          



        </div>

        <div class="row">
            <div class="col-12">
                <a href="{{url('/publicacion/')}}" class="btn btn-secondary" >Volver</a>
                <a href="{{url('/producto/'.$publicacion->producto_id.'/edit')}}">
                    <input type="submit" value="Editar" class="btn btn-warning float-right">
                </a>
                <br>
                <br>
            </div>
        </div>

    </div>

    @include('Publicaciones.preguntas', ['preguntas' => $publicacion->preguntas, 'publicacion_id' => $publicacion->publicacion_id])

@stop
