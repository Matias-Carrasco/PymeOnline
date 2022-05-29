@extends('adminlte::page')

@section('css')

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- DataTable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<style>
    .cardTablaTags {
        float: left;
        width: 50%;
    }
</style>

@endsection

@section('content')

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta tags requeridas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Tags</title>

    <!-- Boostrap -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



</head>

<body>

    <!-- Alertas usando Bootstrap5 -->
    @include('common.alerts')

    <div>
        <!-- Card izq. que contiene la tabla de tags -->
        <div class="card cardTablaTags" style="float: left; width:50%">
            <div class="card-body">
                <table class="table-hover display" style="width: 100%" id="tablaTags">

                    <!-- Ancho de cada columna en la tabla -->
                    <colgroup>
                        <col style="width:40%">
                        <col style="width:30%">
                        <col style="width:30%">
                    </colgroup>

                    <thead class="thead-sm">
                        <div style="display: flex; justify-content: space-between;">
                            <h4>Tabla de tags</h4>
                            <a href="{{url('tags/create')}}" class="btn btn-success" style="align-self: center"> Crear nuevo Tag </a>
                        </div>
                        <br>

                        <tr>
                            <th style="text-align: left">Nombre</th>
                            <th style="text-align: left">Numero usos</th>
                            <th style="text-align: left">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->tag_nombre }}</td>
                            <td>placeholder</td>
                            <td>
                                <!-- Contenedor de botones para acciones en la tupla -->
                                <div class="container-md" id="contenedorAccionesTupla">

                                    <!--Boton para ver Detalle de Tag
                                    

                                    <!--Boton para editar Tag -->
                                    <form action="{{url('/tags/'.$tag->tag_id.'/edit')}}" class="d-inline">
                                        <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar Tag"><i class="fas fa-edit"></i></button>
                                    </form>

                                    <!--Boton eliminar Tag -->
                                    <form action="{{url('/tags/'.$tag->tag_id)}}" class="d-inline" method="post">
                                        @csrf
                                        {{method_field('DELETE')}}

                                        <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar Tag" onclick="return confirm('¿Estás seguro/a que deseas eliminar este Tag? Esto  no es reversible y lo eliminara de todas las publicaciones')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <!-- ./Contenedor de botones para acciones en la tupla -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot class="tfoot-sm">
                        <tr>
                            <th style="text-align: left">Nombre</th>
                            <th style="text-align: left">Numero usos</th>
                            <th style="text-align: left">Acciones</th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        </div>

        <!-- Card der.  -->
        <div class="card cardTablaTags" style="float: right; width:50%">
            <div class="card-body">
            </div>
        </div>
    </div>

</body>

</html>

@section('js')
<!-- JQuery 3.5 -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<!-- TableEdit -->
<script src={{asset('/js/jquery.tabledit.js')}}></script>

<!-- Asignar formato DataTable a Tabla de tags -->
<script>
    $(document).ready(function() {
        $('#tablaTags').DataTable({
            responsive: true,
            scrollY: '50vh',
            scrollCollapse: true,
            paging: false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            }
        });
    });
    // jQuery('#ajaxSubmit').click(function(e) {
    //     e.preventDefault();
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     jQuery.ajax({
    //         url: "{{ url('/grocery/post') }}",
    //         method: 'post',
    //         data: {
    //             name: jQuery('#name').val(),
    //             type: jQuery('#type').val(),
    //             price: jQuery('#price').val()
    //         },
    //         success: function(result) {
    //             console.log(result);
    //         }
    //     });
    // });
</script>

@endsection('js')


@endsection