@include('clientes.show')










<!--  

<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Rut</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->cliente_id}}</td>
            <td>{{$cliente->cliente_nombre}}</td>
            <td>{{$cliente->cliente_apellido}}</td>
            <td>{{$cliente->cliente_rut}}</td>
            <td>
                <a href="{{url('/clientes/'.$cliente->cliente_id.'/edit') }}">
                Editar
                </a>
                
                <form action="{{url('/clientes/'.$cliente->cliente_id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                </form>
            </td>
        </tr>
    </tbody>
    @endforeach
</table>
-->
