@extends('adminlte::page')

@section('content')

<form action="{{url('/tags')}}" method="post">

    @csrf
    @include('tags.forms.form',['modo'=>'Crear'])

</form>


@endsection