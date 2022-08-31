@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table-hover display" id="tabla1" style="width:100%">
                <thead>
                    <div style="display: flex; justify-content: space-between;">
                        <h4>Tabla de Tiendas por Verificar</h4>

                    </div>
                    <tr>
                        <th>ID usuario</th>
                        <th>Tipo de Usuario</th>
                        <th>Email</th>

                        <th>Creación</th>

                        <th>Opciones</th>

                    </tr>
                </thead>
                <tbody>


                        @foreach ($usuarios as $usr)
                        <tr>

                            <td>
                                {{$usr->id}}
                            </td>

                            @if (($usr->rol_id)==1)

                                <td>Administrador</td>

                            @elseif (($usr->rol_id)==2)

                                <td>Cliente</td>

                            @elseif (($usr->rol_id)==3)

                                <td>Tienda</td>

                            @endif


                            <td>
                                {{$usr->email}}
                            </td>
                            <td>
                                {{$usr->email_verified_at}}
                            </td>

                            @if (($usr->rol_id)==1)

                                <td><h3>ADMIN</h3></td>

                            @else

                                <td>
                                    <div class="acciones">
                                        <a href="{{url('/admin/verificare/'.$usr->id.'/')}}">
                                            <button type="submit" class="btn btn-block btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Revisar">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                    </div>

                                </td>
                            @endif

                        </tr>

                        @endforeach





                </tbody>

            </table>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
.acciones{
    display: inline-block;
}
</style>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#tabla1").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                },
            });
        });
    </script>
@stop
