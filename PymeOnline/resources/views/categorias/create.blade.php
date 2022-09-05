<form action="{{url('/categorias')}}" method="post" enctype="multipart/form-data">
    @csrf
@include('categorias.form',['modo'=>'Crear'])

</form>