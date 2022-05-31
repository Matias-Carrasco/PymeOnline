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
                <td class="border px-14 py-1">
                    @foreach ($imagenes as $img)
                        @if ($img['producto_id'] == $pro['producto_id'])
                            <img src="{{$img->imagen_url}}" width="30%">
                        @endif
                        
                    @endforeach
                    
                </td>


                <td>
                    <form method="post" action="{{url('/producto/'.$pro->pro_id)}}">
                        {{csrf_field() }}
                        {{method_field('GET')}}
                        <button type="submit" class="btn btn-block btn-success">Ver mas</button>

                    </form>
                </td>
                <td>
                    <a href="{{url('/producto/'.$pro->id.'/edit')}}">
                        <button type="submit" class="btn btn-block btn-warning"
                            onclick="return confirm('Editar');">Editar</button>
                    </a>

                </td>
                <td>
                    dd({{$pro->id}});
                    <form method="post" action="{{url('/producto/'.$pro->id)}}">
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
