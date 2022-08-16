@extends('adminlte::page')

@section('title', 'Publicacion')

@section('content_header')
<h1>Publicacion</h1>

@stop

@section('content')

<div class="row">
    <div class="row justify-content-end">
        <div class="col-3">
            <!-- Boton Crear publicacion -->
            <a href="{{ url('/publicacion/create') }}" class="btn btn-primary btn-lg float-right">
                <i class="fas fa-plus-circle"></i>
            </a>

        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabla de Publicacion</h3>
    </div>
    <div class="card-body">
        <table class="table-hover display" id="tabla3" style="width:100%">
            <thead class="thead-sm">

                <br>


                <tr>
                    <th style="text-align: left">Titulo Publicacion</th>
                    <th style="text-align: left">Precio</th>
                    <th style="text-align: left">Porcentaje Descuento</th>
                    <th style="text-align: left">Acciones</th>
                </tr>





            </thead>


            <tbody>
                @include('common.alerts')

                @foreach($publicaciones as $publi)

                <tr>
                    <td>{{$publi->publicacion_titulo}}</td>
                    <td>{{$publi->publicacion_precio}}</td>
                    <td>{{$publi->publicacion_oferta_porcentual}}</td>
                    <td> 
                        <div class="container-md">

                        <div class="acciones">
                            <form method="post" action="{{ url('/publicacion/'.$publi->publicacion_id) }}">
                        {{ csrf_field() }}
                        {{ method_field('GET') }}
                        <button type="submit" class="btn btn-block btn-success" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Ver más">
                            <i class="fas fa-search"></i>
                        </button>

                        </form>
    </div>


    <div class="acciones">
        <form action="{{ url('/publicacion/' . $publi->publicacion_id . '/edit') }}" class="d-inline">
            <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Editar Producto"><i class="fas fa-edit"></i></button>
        </form>
    </div>



    <div class="acciones">
        <form action="{{ url('/publicacion/'.$publi->publicacion_id) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE') }}

            <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Eliminar Producto"
                onclick="return confirm('¿Estás seguro/a que deseas eliminar esta publicacion? Esto  no es reversible.')">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </div>

</div>
</td>



</tr>

@endforeach





</table>
</div>
</div>
@stop

@section('css')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<style>
    .acciones {
        display: inline-block;
    }

    .truncate {
        max-width: 400px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function () {

        $("#tabla3").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            columnDefs: [{
                targets: [0, 1],
                className: "truncate"
            }],
            createdRow: function (row) {
                $(row).find(".truncate").each(function () {
                    $(this).attr("title", this.innerText);
                });
            }
        });
    });

</script>
@stop
