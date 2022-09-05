@extends('adminlte::page')

@section('title', 'Categorías')


@section('css')

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- DataTable CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">



@endsection


@section('content')

@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif

<div class="card">
    <div class="card-body">



        <table id="tabla" class="table table-light">

            <thead class="thead-light">

                <div style="display: flex; justify-content: space-between;">
                    <h4>Tabla categorías.</h4>
                    <a href=" {{url ('/categorias/create')}}" class="btn btn-primary btn-lg float-right">
                        <i class="fas fa-plus-circle"></i>
                    </a>
                </div>
                <br>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>

                </tr>


            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>


                    <td>{{$categoria->categoria_id}}</td>
                    <td>{{$categoria->categoria_nombre}}</td>
                    <td>
                        <a href="{{url ('/categorias/'.$categoria->categoria_id.'/edit')}}">

                        <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar Categoria"><i class="fas fa-edit"></i></button>

                        </a>

                        <form action="{{url ('/categorias/'.$categoria->categoria_id)}}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}

                            <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar Categoria" onclick="return confirm('¿Desea borrar?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>




        </table>
    </div>
</div>
@endsection



@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

</script>
<script>
    $(document).ready(function() {

        $("#tabla").DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
            },
            responsive: true,
       
            paging: true,
            dom: "Pfrtip"
        });

    });
</script>

@stop