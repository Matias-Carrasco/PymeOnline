Create tags

@extends('adminlte::page')

@section('content')

<form action="{{ url('/tags') }}" method="post">
    @csrf
    <label for="inputIDTienda"> Placeholder ID Tienda </label>
    <input type="number" name="tienda_id" id="inputIDTienda">
    <br>

    <label for="inputNombre"> Nombre </label>
    <input type="text" name="Nombre" id="inputNombre">
    <br>

    <input type="submit" value="Agregar">
</form>

@endsection