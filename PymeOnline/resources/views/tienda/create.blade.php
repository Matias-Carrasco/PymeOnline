<form action="{{url('/tienda')}}" method="post" enctype="multipart/form-data" >
@csrf
@include('tienda.form', ['modo'=>'Crear']);

</form>