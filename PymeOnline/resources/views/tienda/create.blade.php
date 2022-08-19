ESTO ES CREATE

<form action="{{url('/tienda')}}" method="post" enctype="multipart/form-data" >
@csrf
@include('tienda.form');

</form>