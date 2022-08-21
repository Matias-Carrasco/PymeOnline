@extends('adminlte::page')

@section('content')

<h2> {{ $modo }} tienda </h2>

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>    
    @foreach( $errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
</ul>
</div>
@endif

<div class="form-group">
<label for="tienda_rut_responsable"> RUT de Responsable</label>
<input type="text" name="tienda_rut_responsable" class="form-control" 
value="{{ isset($perfil->tienda_rut_responsable)?$perfil->tienda_rut_responsable:old('tienda_rut_responsable')}}" id="tienda_rut_responsable">
<br>
</div>

<div class="form-group">
<label for="tienda_nombre_responsable"> Nombre de Responsable</label>
<input type="text" name="tienda_nombre_responsable"  class="form-control"
 value="{{ isset($perfil->tienda_nombre_responsable)?$perfil->tienda_nombre_responsable:old('tienda_nombre_responsable')}}" id="tienda_nombre_responsable">
<br>
</div>

<div class="form-group">
<label for="tienda_primer_apellido_responsable"> Primer Apellido de Responsable</label>
<input type="text" name="tienda_primer_apellido_responsable" class="form-control"
 value="{{ isset($perfil->tienda_primer_apellido_responsable)?$perfil->tienda_primer_apellido_responsable:old('tienda_primer_apellido_responsable') }}" id="tienda_primer_apellido_responsable">
<br>
</div>

<div class="form-group">
<label for="tienda_segundo_apellido_responsable"> Segundo Apellido de Responsable</label>
<input type="text" name="tienda_segundo_apellido_responsable" class="form-control"
 value="{{ isset($perfil->tienda_segundo_apellido_responsable)?$perfil->tienda_segundo_apellido_responsable:old('tienda_segundo_apellido_responsable') }}" id="tienda_segundo_apellido_responsable">
<br>
</div>

<div class="form-group">
<label for="tienda_nombre"> Nombre de la tienda</label>
<input type="text" name="tienda_nombre" class="form-control"
 value="{{ isset($perfil->tienda_nombre)?$perfil->tienda_nombre:old('tienda_nombre')}}" id="tienda_nombre">
<br>
</div>

<div class="form-group">
<label for="tienda_numero_contacto"> Numero de contacto</label>
<input type="text" name="tienda_numero_contacto" class="form-control"
 value="{{ isset($perfil->tienda_numero_contacto)?$perfil->tienda_numero_contacto:old('tienda_numero_contacto')}}" id="tienda_numero_contacto">
<br>
</div>

<div class="form-group">
<label for="tienda_mail_contacto"> Correo de contacto</label>
<input type="text" name="tienda_mail_contacto" class="form-control"
 value="{{ isset($perfil->tienda_mail_contacto)?$perfil->tienda_mail_contacto:old('tienda_mail_contacto')}}" id="tienda_mail_contacto">
<br>
</div>

<a href="{{url('tienda')}}" class="btn btn-secondary"> <i class="fa-solid fa-turn-down-left"></i>Volver</a>
<input type="submit"  class="btn btn-primary" value="{{ $modo }} tienda"> <br>
@endsection