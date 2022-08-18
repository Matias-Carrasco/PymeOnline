@extends('adminlte::page')

@section('css')

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- DataTable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<style>
    .acciones {
        display: inline-block;
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

    <!-- Boostrap-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Highcharts CSS-->
    <script src="https://code.highcharts.com/highcharts.js"></script>

</head>

<body>

    <!-- Alertas usando Bootstrap5 -->
    @include('common.alerts')

    <div>
        <!-- Card izq. que contiene la tabla de tags -->
        <div class="card" style="float: left; width:50%" id="cardL">
            <div class="card-body">
                <table class="table-hover display" style="width: 100%" id="tablaTags">

                    <!-- Ancho de cada columna en la tabla -->
                    <colgroup>
                        <col style="width:40%">
                        <col style="width:40%">
                        <col style="width:20%">
                    </colgroup>

                    <thead class="thead-sm">
                        <div style="display: flex; justify-content: space-between;">

                            <h4>Tabla de tags</h4>

                            <!-- Boton Crear, Modal -->
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate" style="align-self: center">
                                <i class="fas fa-plus-circle"></i>
                            </a>

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
                            <td>{{ $tag->count ?? '0' }}</td>
                            <td>
                                <div>
                                    <!--Boton para editar Tag -->
                                    <div class="acciones">
                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalEditar" data-bs-id="{{$tag->tag_id}}" data-bs-nombre="{{$tag->tag_nombre}}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>

                                    <!--Boton eliminar Tag -->
                                    <div class="acciones">
                                        <form action="{{url('/tags/'.$tag->tag_id)}}" class="d-inline" method="post">
                                            @csrf
                                            {{method_field('DELETE')}}

                                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro/a que deseas eliminar este Tag? Esto  no es reversible y lo eliminara de todas las publicaciones')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>
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
        <!-- / Card izq. -->

        <!-- Card der.  -->
        <div class="card" style="float: right; width:50%" id="cardR">
            <div class="card-body">
            </div>
        </div>
        <!-- / Card der.  -->

    </div>

    <!-- Modal Create -->
    @include('tags.modal.create')

    <!-- Modal Edit -->

    <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="ModalEditarTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('tags.update',0) }}" data-bs-action="{{route('tags.update',0)}}" id="modalFormEdit" method="post">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Editar tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tag_nombre"> Nuevo nombre</label>
                            <lavel for="tag_nombre" class="text-danger"> *campo obligatorio</lavel>
                            <input type="text" class="form-control {{$errors->has('tag_nombre')?'is-invalid':''}} " name="tag_nombre" value="{{isset($tag->tag_nombre)?$tag->tag_nombre:old('tag_nombre') }}" id="tag_nombre">

                            {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                            <!--Si se encuentra un error en ese campo mostrara el mensaje de error-->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Volver</button>

                        @csrf @method('PATCH')
                        <button type="submit" class="btn btn-primary" id="botonGuardar">Actualizar</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- / Modal Edit -->

</body>

</html>

@section('js')

<!-- JQuery 3.5 -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<!-- Highcharts -->
<script src="//code.highcharts.com/highcharts.js"></script>

<!-- Js Tooltips -->
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- Datable y chart -->
<script>
    $(document).ready(function() {

        // Asignar formato a datatable
        var tablaTags = $('#tablaTags').DataTable({
            responsive: true,
            scrollY: '50vh',
            scrollCollapse: true,
            paging: false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            dom: "Pfrtip"
        });


        var container = $('#cardR');

        var datosTabla = getTableData(tablaTags);
        createHighChart(datosTabla);
        setTableEvents(tablaTags);

        // Funcion para extraer datos de la tabla al formato usado por el chart
        function getTableData(table) {

            const dataArray = [],
                name = [],
                nusos = [];

            table.rows({
                search: "applied"
            }).every(function() {
                const data = this.data();
                name.push(data[0]);
                nusos.push(Number(data[1]));
            });

            dataArray.push(name, nusos);

            return dataArray;
        }

        // Funcion para crear un grafico pie usando los datos extraidos
        function createHighChart(data) {
            var chart = Highcharts.chart(container[0], {
                chart: {
                    type: 'pie',
                },
                title: {
                    text: 'Distribucion de tags',
                },
                tooltip:{
                    headerFormat: ''
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            formatter: function() {
                                var sliceIndex = this.point.index;
                                var sliceName = this.series.chart.axes[0].categories[sliceIndex];
                                return sliceName;
                            }
                        }
                    }
                },
                xAxis: {
                    categories: data[0]
                },
                series: [{
                    name: "numero de usos",
                    data: data[1]
                }],
                credits: {
                    enabled: false
                }
            });
        }

        // Funcion para agregar eventos y actualizar el grafico segun se actualiza la tabla
        function setTableEvents(table) {
            let draw = false;
            table.on("page", () => {
                draw = true;
            });
            table.on("draw", () => {
                if (draw) {
                    draw = false;
                } else {
                    const datosTabla = getTableData(tablaTags);
                    createHighChart(datosTabla);
                }
            })
        }

    });
</script>

<!-- Funcion para invocar al modal de editar -->
<script>
    $(document).ready(function() {
        var modalEditar = document.getElementById('ModalEditar')
        modalEditar.addEventListener('show.bs.modal', function(event) {

            // Button que llamo al modal
            var button = event.relatedTarget

            // Atributos pasados
            var tag_id = button.getAttribute('data-bs-id')
            var tag_nombre = button.getAttribute('data-bs-nombre')

            // Remover ID default de la ruta de accion y cambiarlo por el del tag
            action = $('#modalFormEdit').attr('data-bs-action').slice(0, -1)
            action += tag_id
            $('#modalFormEdit').attr('action', action)

            var modalTitle = modalEditar.querySelector('.modal-title')
            var modalBodyInput = modalEditar.querySelector('.modal-body input')

            modalTitle.textContent = 'Editando: ' + tag_nombre
            modalBodyInput.value = tag_nombre
        });
    })
</script>

@endsection('js')


@endsection