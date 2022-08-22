@extends('adminlte::page')

@section('title', 'Editar Publicacion')

@section('content')
<h1>Publicacion</h1>
<form action="{{url('/publicacion/'.$publicacion->publicacion_id)}}" method="post" enctype="multipart/form-data">
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

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rellene los datos</h3>
                    </div>

                    <div class="card-body card-shadow mb-3" style="display: block;">

                        <div class=" form-group">

                            <div class="row">

                                <div class="col-6"> <label class="form-label" for="productos">Seleccione producto a
                                        publicar: </label>

                                </div>
                                <div class="col-6"> <label class="form-label" for="categoria">Seleccione categoria:
                                    </label>
                                </div>

                                <div class="col-6">

                                    <select class="form-select form-control" name="producto_id" id="producto_id">
                                        <option value="{{$productoPublicacion->producto_id}}">{{$productoPublicacion->producto_nombre}}</option>
                                        @foreach ($producto as $productos)
                                        <option value="{{$productos-> producto_id}}"> {{$productos->producto_nombre}}
                                        </option>
                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-6">

                                    <select class="form-select form-control" name="categoria_id" id="categoria_id">
                                        <option value="{{$categoria->categoria_id}}">{{$categoria->categoria_nombre}}</option>
                                        @foreach ($categorias as $categoriaFor)
                                        <option value="{{$categoriaFor->categoria_id}}">
                                            {{$categoriaFor->categoria_nombre}} </option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="col-12"><br></div>
                                <div class="col-12"><br></div>

                                <div class="col-6"> <label class="form-label"
                                        for="publicacion_titulo">{{'Titulo publicacion:'}}</label>
                                </div>
                                <div class="col-6"> <label class="form-label"
                                        for="publicacion_titulo">{{'Precio:'}}</label>
                                </div>

                                <div class="col-6">

                                    <input class="form-control" type="text" name="publicacion_titulo"
                                        id="publicacion_titulo" value="{{$publicacion->publicacion_titulo}}">


                                </div>

                                <div class="col-6">

                                    <input class="form-control" type="text" name="publicacion_precio"
                                        id="publicacion_precio" value="{{$publicacion->publicacion_precio}}">
                                </div>

                                <div class="col-12"><br></div>

                            </div>

                            <div class="row justify-content-center">
                                <div class="col-4">

                                    <label class="form-label"
                                        for="publicacion_oferta_porcentual ">{{'Oferta porcentual:'}}</label>
                                    <input class="form-control" type="text" name="publicacion_oferta_porcentual"
                                        id="publicacion_oferta_porcentual"
                                        value="{{$publicacion->publicacion_oferta_porcentual}}">

                                </div>

                                <div class="col-4">

                                    <label class="form-label"
                                        for="pulicacion_activo ">{{'Estado Publicacion'}}</label>
                                    <select class="form-select form-control" name="pulicacion_activo"
                                        id="pulicacion_activo">
                                        <option value="1">Activo</option>
                                        <option value="0">Desactivado</option>
                                      
                                    </select>

                                </div>


                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <a href="{{url('/publicacion')}}" class="btn btn-secondary">Cancel</a>
                                <input type="submit" value="Editar" class="btn btn-success float-right">
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>


    </section>
</form>
@stop


@section('css')

@stop

@section('js')
<script>



</script>
@stop
