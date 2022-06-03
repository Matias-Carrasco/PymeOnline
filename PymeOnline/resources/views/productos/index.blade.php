@extends('adminlte::page')

@section('title', 'Producto')

@section('content_header')
    <h1>Producto</h1>

@stop

@section('content')

    <div class="row">
        <div class="row justify-content-end">
            <div class="col-3">
                <!-- Boton Crear Producto -->
                <a href="{{ url('/producto/create') }}" class="btn btn-primary btn-lg float-right">
                    <i class="fas fa-plus-circle"></i>
                </a>

            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tabla de Productos</h3>
        </div>
        <div class="card-body">
            <table class="table" id="tabla3">
                <thead class="thead-sm">

                    <br>

                    <tr>
                        <th style="text-align: left">Nombre Producto</th>
                        <th style="text-align: left">Descripción Producto</th>
                        <th style="text-align: left">Imagen</th>
                        <th style="text-align: left">Acciones</th>
                    </tr>
                </thead>


                <tbody>
                    @include('common.alerts')
                    @foreach ($productos as $pro)
                        <tr>

                            <td>{{ $pro->producto_nombre }}</td>
                            <td>{{ $pro->producto_descripcion }}</td>
                            <td>{{-- Carrusel --}}
                                @php
                                    $numimg = 0;
                                @endphp
                                <div id="carousel{{ $pro->producto_id }}" class="carousel slide" data-bs-ride="true">
                                    <div class="carousel-indicators">
                                        @foreach ($imagenes as $img)
                                            @if ($img['producto_id'] == $pro['producto_id'])
                                                @if ($numimg == 0)
                                                    <button type="button"
                                                        data-bs-target="#carousel{{ $pro->producto_id }}"
                                                        data-bs-slide-to="0" class="active" aria-current="true"
                                                        aria-label="Slide 1"></button>
                                                @else
                                                    <button type="button"
                                                        data-bs-target="#carousel{{ $pro->producto_id }}"
                                                        data-bs-slide-to="{{ $numimg }}"
                                                        aria-label="Slide {{ $numimg }}"></button>
                                                @endif
                                                @php
                                                    $numimg = $numimg + 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </div>
                                    @php
                                        $numimg = 0;
                                    @endphp
                                    <div class="carousel-inner">
                                        @foreach ($imagenes as $img)
                                            @if ($img['producto_id'] == $pro['producto_id'])
                                                @if ($numimg == 0)
                                                    <div class="carousel-item active">
                                                        <img src="{{ $img->imagen_url }}" alt="..." class="img-responsive"
                                                            width="300" height="200">
                                                    </div>
                                                @else
                                                    <div class="carousel-item">
                                                        <img src="{{ $img->imagen_url }}" alt="..." class="img-responsive"
                                                            width="300" height="200">
                                                    </div>
                                                @endif
                                                @php
                                                    $numimg = $numimg + 1;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carousel{{ $pro->producto_id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="carousel{{ $pro->producto_id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>


                            </td>{{-- Carrusel --}}


                            <td>

                                <div class="container-md">

                                    <div class="acciones">
                                        <form method="post" action="{{ url('/producto/' . $pro->producto_id) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('GET') }}
                                            <button type="submit" class="btn btn-block btn-success" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Ver más">
                                                <i class="fas fa-search"></i>
                                            </button>

                                        </form>
                                    </div>


                                    <div class="acciones">
                                        <form action="{{ url('/producto/' . $pro->producto_id . '/edit') }}"
                                            class="d-inline">
                                            <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Editar Producto"><i
                                                    class="fas fa-edit"></i></button>
                                        </form>
                                    </div>



                                    <div class="acciones">
                                        <form action="{{ url('/producto/' . $pro->producto_id) }}" class="d-inline"
                                            method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Eliminar Producto"
                                                onclick="return confirm('¿Estás seguro/a que deseas eliminar este Producto? Esto  no es reversible.')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
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
        $(document).ready(function() {

            $("#tabla3").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
            });
        });
    </script>
@stop
