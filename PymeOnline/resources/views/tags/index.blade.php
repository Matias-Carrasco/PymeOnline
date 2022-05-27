@extends('adminlte::page')

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

    @if(Session::has('mensaje'))
    <!--Si hay algun mensaje este de debe mostrar-->
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{Session::get('mensaje')}}

        <!--Para hacer desaparecer el alert-->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-responsive" id="tablaTags">
                <thead class="thead-default">
                    <div style="display: flex; justify-content: space-between">
                        <h4>Tabla de tags</h4>
                        <a href="{{url('tags/create')}}" class="btn btn-success" style="align-self: center; width: 200px"> Crear nuevo Tag </a>
                    </div>
                    <tr>
                        <th style="text-align: left">Nombre</th>
                        <th style="text-align: left">Numero usos</th>
                        <th style="text-align: left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td scope="row">{{ $tag->tag_nombre }}</td>
                        <td>placeholder</td>
                        <td>
                            <!-- Contenedor de botones para acciones en la tupla -->
                            <div class="container-md" id="contenedorAccionesTupla">
                                <div class="row mb-2">
                                    <div class="col-13">

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
                                </div>
                            </div>
                            <!-- ./Contenedor de botones para acciones en la tupla -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
</body>

</html>


<!-- Scripts -->

@endsection