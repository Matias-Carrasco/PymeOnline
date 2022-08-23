<form action="{{ url('/clientes')}}" method="post" enctype="multipart/form-data">
 @csrf
@include('clientes.form')
</form>