@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
<h1>Producto</h1>

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{url('/producto/create')}}" class="btn btn-primary btn-lg float-right">Agregar</a>


    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Producto</h3>


    </div>

    <table class="table" id="tabla3">
        <thead>
            <tr>
                <th>Nombre Producto</th>
                <th>Descripción Producto</th>
                <th>Imagen</th>
                <th></th>
                <th></th>
                <th></th>


            </tr>
        </thead>

        <tbody>
            @foreach($productos as $pro)
            <tr>

                <td>{{$pro->producto_nombre}}</td>
                <td>{{$pro->producto_descripcion}}</td>
                <td>
                    @php
                        $numimg=0;
                    @endphp
                    <div id="carousel{{$pro->producto_id}}" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-indicators">
                            @foreach ($imagenes as $img)
                                    
                                @if ($img['producto_id'] == $pro['producto_id'])
                                
                                    @if ($numimg == 0)
                                    <button type="button" data-bs-target="#carousel{{$pro->producto_id}}" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    @else 
                                    <button type="button" data-bs-target="#carousel{{$pro->producto_id}}" data-bs-slide-to="{{$numimg}}" aria-label="Slide {{$numimg}}"></button>
                                    @endif
                                    @php
                                        $numimg= $numimg+1;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                        @php
                            $numimg= 0;
                        @endphp
                        <div class="carousel-inner">
                            @foreach ($imagenes as $img)
                                    
                                @if ($img['producto_id'] == $pro['producto_id'])
                                
                                    @if ($numimg == 0)
                                        <div class="carousel-item active">
                                            <img src="{{$img->imagen_url}}" alt="..." class="img-responsive" width="300" height="200">
                                        </div>
                                    @else 
                                        <div class="carousel-item">
                                            <img src="{{$img->imagen_url}}" alt="..." class="img-responsive" width="300" height="200">
                                        </div>
                                    @endif
                                    @php
                                        $numimg= $numimg+1;
                                    @endphp
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{$pro->producto_id}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="carousel{{$pro->producto_id}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    
                    
                </td>


                <td>
                    <form method="post" action="{{url('/producto/'.$pro->producto_id)}}">
                        {{csrf_field() }}
                        {{method_field('GET')}}
                        <button type="submit" class="btn btn-block btn-success">Ver mas</button>

                    </form>
                </td>
                <td>
                    <a href="{{url('/producto/'.$pro->producto_id.'/edit')}}">
                        <button type="submit" class="btn btn-block btn-warning"
                            onclick="return confirm('Editar');">Editar</button>
                    </a>

                </td>
                <td>

                    <form method="post" action="{{url('/producto/'.$pro->producto_id)}}">
                        {{csrf_field() }}
                        {{method_field('DELETE')}}
                        <button type="submit" class="btn btn-block btn-danger"
                            onclick="return confirm('Borrar');">Borrar</button>

                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        
        $("#tabla3").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
        });
    });
    
</script>
@stop
