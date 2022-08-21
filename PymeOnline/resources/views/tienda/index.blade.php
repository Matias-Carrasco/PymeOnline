@extends('adminlte::page')


@section('content')
<div>
@if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        @if(Session::has('mensaje'))
        {{Session::get('mensaje')}}
      
        @endif

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <h1>Perfil de Tienda</h1>
<table class="table table-light">
    <thead class="thead-light">
    <tr>
        <th>ID</th>
        <th>ID de Usuario</th>
        <th>RUT</th>
        <th>Nombre de tienda</th>
        <th>Nombre del Responsable</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Telefono de contacto</th>
        <th>Correo</th>
        <th>Opciones</th>
    </tr>
    </thead>
    <tbody>
    @foreach( $tienda as $perfil )
    <tr>
        <td>{{ $perfil-> tienda_id }}</td>
        <td>{{ $perfil-> id }}</td>
        <td>{{ $perfil-> tienda_rut_responsable }}</td>
        <td>{{ $perfil-> tienda_nombre }}</td>
        <td>{{ $perfil-> tienda_nombre_responsable }}</td>
        <td>{{ $perfil-> tienda_primer_apellido_responsable }}</td>
        <td>{{ $perfil-> tienda_segundo_apellido_responsable }}</td>
        <td>{{ $perfil-> tienda_numero_contacto }}</td>
        <td>{{ $perfil-> tienda_mail_contacto }}</td>
        <td>
            <a href="{{url('/tienda/'.$perfil->tienda_id.'/edit') }}">
                <button type="submit" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>
            </a>
             <form action="{{ url('/tienda/'.$perfil->tienda_id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Eliminar" onclick="return confirm('¿Estás seguro/a que deseas eliminar esta tienda? Esto no es reversible')">
                <i class="fas fa-trash"></i>
                </button>
             </form> </td>
    </tr>
    @endforeach
    </tbody>
    
</table>
@if(count($tienda)==1)
    <br>
    <br>
    <br>
    @elseif(count($tienda)==0)
    <a href="{{url('tienda/create')}}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i>Registrar nueva tienda</a>
    <br>
    <br>
    @endif
</div>

@endsection