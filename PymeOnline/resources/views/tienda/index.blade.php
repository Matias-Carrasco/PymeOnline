ESTO ES INDEX

<table class="table table-light">
    <thead class="thread-light">
    @if(isset($tienda->tienda_id))
        
    @else
    <a href="{{url('tienda/create')}}"> Registrar nueva tienda</a>
    @endif

    <tr>
        <th>#</th>
        <th>Estilo #</th>
        <th>Usuario #</th>
        <th>Dirección #</th>
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
        <td>{{ $perfil-> estilo_id }}</td>
        <td>{{ $perfil-> id }}</td>
        <td>{{ $perfil-> direccion_id }}</td>
        <td>{{ $perfil-> tienda_rut_responsable }}</td>
        <td>{{ $perfil-> tienda_nombre }}</td>
        <td>{{ $perfil-> tienda_nombre_responsable }}</td>
        <td>{{ $perfil-> tienda_primer_apellido_responsable }}</td>
        <td>{{ $perfil-> tienda_segundo_apellido_responsable }}</td>
        <td>{{ $perfil-> tienda_numero_contacto }}</td>
        <td>{{ $perfil-> tienda_mail_contacto }}</td>
        <td>
            <a href="{{url('/tienda/'.$perfil->tienda_id.'/edit') }}">
                Editar
            </a>
             <form action="{{ url('/tienda/'.$perfil->tienda_id) }}" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input type="submit" onclick="return confirm('Quieres borrar?')" value="Borrar">
             </form> </td>
    </tr>
    @endforeach
    </tbody>
    
</table>