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
                    <th style="text-align: left">ID</th>
                    <th style="text-align: left">Titulo Publicacion</th>
                    <th style="text-align: left">Precio</th>
                    <th style="text-align: left">Porcentaje Descuento</th>
                    <th style="text-align: left">Reseñas</th>
                    <th style="text-align: left">Estado</th>
                    <th style="text-align: left">Acciones</th>
                </tr>





            </thead>


            <tbody>
                @include('common.alerts')

                @foreach($publicaciones as $publi)

                <tr>
                    <td>{{$publi->publicacion_id}}</td>
                    <td>{{$publi->publicacion_titulo}}</td>
                    <td>{{$publi->publicacion_precio}}</td>
                    <td>{{$publi->publicacion_oferta_porcentual}}</td>
                    <td>
                        <div class="resenas" id="resenas">
                        </div>
                    </td>
                    @if($publi->pulicacion_activo==0)


                    <td> 
                    <div class="info-box  bg-danger">
                        <span class="info-box-icon"><i class="fas fa-thumbs-down"></i></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Desactiva</span>
                        </div>

                    </div>
                    </td>


                    @else
                    <td>
                        <div class="info-box bg-success">
                            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Activa</span>
                            </div>
                        </div>
                    </td>


                    @endif




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
                                <form action="{{ url('/publicacion/' . $publi->publicacion_id . '/edit') }}"
                                    class="d-inline">
                                    <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Editar Producto"><i
                                            class="fas fa-edit"></i></button>
                                </form>
                            </div>



                            <div class="acciones">
                                <form action="{{ url('/publicacion/'.$publi->publicacion_id) }}" class="d-inline"
                                    method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip"
                                        data-bs-placement="bottom" title="Eliminar Producto"
                                        onclick="return confirm('¿Estás seguro/a que deseas eliminar esta publicacion? Esto  no es reversible.')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="acciones">
                                
                                
                                <form action="{{ route('cart.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $publi->producto_id }}" id="id" name="id">
                                    
                                    <input type="hidden" value="1" id="quantity" name="quantity">
                                    <div class="card-footer" >
                                          <div class="row">
                                            <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                <i class="fa fa-shopping-cart"></i> agregar al carrito
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                    </td>



                </tr>

                @endforeach





        </table>
    </div>
</div>

<!-- Modal Reseñas -->
<div class="modal fade" id="ModalRes" tabindex="-1" role="dialog" aria-labelledby="ModalRes" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('PubliGetRes',0) }}" data-bs-action="{{route('PubliGetRes',0)}}" id="modalFormRes"
            method="get">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <table class="table-hover display" id="modalResTable">

                        <colgroup>
                            <col style="width:25%">
                            <col style="width:75%">
                        </colgroup>

                        <thead>
                            <tr>
                                <th></th>
                                <th>Reseña</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </form>
    </div>
</div>
<!-- / Modal Reseñas -->

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

        // Construir botones de reseñas antes de crear datatable
        var tabla = document.getElementById("tabla3")
        for (var i = 1, row; row = tabla.rows[i]; i++) {
            var rowResena = row.cells[4]
            var rowID = row.cells[0].innerText;;
            var rowTitle = row.cells[1].innerText;

            var newHtml =
                "<a href=\"#\" class=\"btn btn-info\" data-bs-toggle=\"modal\" data-bs-target=\"#ModalRes\" data-bs-id=\"" +
                rowID +
                "\" data-bs-nombre=\"" +
                rowTitle +
                "\">";

            $.ajax({
                url: 'publicacion/score/' + rowID,
                type: 'GET',
                async: false,
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (dataResult) {
                    resultData = dataResult.data;
                    contador = 0
                    while (resultData >= 1) {
                        resultData--;
                        contador++
                        newHtml += "<i class=\"fas fa-star\"></i>";
                    }
                    if (resultData > 0) {
                        contador++
                        newHtml += "<i class=\"fas fa-star-half-alt\"></i>";
                    }
                    for (let index = contador; index < 5; index++) {
                        newHtml += "<i class=\"far fa-star\"></i>"
                    }
                    newHtml += " " + dataResult.data.toFixed(2) + "</a>";
                }
            })
            rowResena.innerHTML = newHtml
        }


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

<!-- Funcion para invocar al modal de reseñas -->
<script>
    $(document).ready(function () {
        var modalRes = document.getElementById('ModalRes')

        modalRes.addEventListener('show.bs.modal', function (event) {

            // Button que llamo al modal
            var button = event.relatedTarget
            // Atributos pasados
            var publicacion_id = button.getAttribute('data-bs-id')
            var publicacion_titulo = button.getAttribute('data-bs-nombre')

            // Remover ID default de la ruta de accion y cambiarlo por el de la publicacion
            action = $('#modalFormRes').attr('data-bs-action').slice(0, -1)
            action += publicacion_id
            $('#modalFormRes').attr('action', action)

            // Componentes
            var modalTitle = modalRes.querySelector('.modal-title')
            var modalBody = modalRes.querySelector('.modal-body')

            // Actualizar titulo mopdal
            modalTitle.textContent = 'Reseñas de publicacion ' + publicacion_titulo

            // Mostrar reseñas usando AJAX
            $.ajax({
                url: 'publicacion/res/' + publicacion_id,
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (dataResult) {

                    $("#modalResTable tbody").html("");

                    var resultData = dataResult.data;
                    var bodyData = '';
                    $.each(resultData, function (index, row) {
                        bodyData += "<tr>";
                        bodyData += "<td>"
                        for (let index = 0; index < 5; index++) {
                            if (index < row.resena_califacion) {
                                bodyData += "<i class=\"fas fa-star\"></i>";
                            } else {
                                bodyData += "<i class=\"far fa-star\"></i>";
                            }
                        }
                        bodyData += "</td>";
                        bodyData += "<td>" + row.resena_texto + "</td>";
                        bodyData += "</tr>";
                    })

                    // Actualizar body modal
                    $("#modalResTable tbody").append(bodyData);
                }
            })
        });
    })

</script>

@stop
