<form action="{{url('/categorias/'.$categoria->categoria_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
@include('categorias.form',['modo'=>'Editar'])

</form>