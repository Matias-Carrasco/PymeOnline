@extends('adminlte::page')

@section('content')

<form action="{{url('/tags/'.$tag->tag_id)}}" method="post">
    @csrf
    {{ method_field('PATCH')}}
    @include('tags.forms.form',['modo'=>'Editar'])
</form>

@endsection