@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<h1>Publicacion</h1>
<form action="{{url('/publicacion')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <section class="content">

        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}} </li>
                @endforeach
            </ul>

        </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rellene los datos</h3>
                    </div>

                    <div class="card-body" style="display: block;">

                       <div class="row">
                           <div class="col-6">
                            <select class="form-select" name="productos" id="productos">

                                <option value="">-- Seleccione Producto--</option>
                                @foreach ($producto as $productos)
                                <option value="{{$productos['producto_id']}}"> {{$productos['producto_nombre']}} </option>
                                @endforeach
    
                            </select>
                           </div>
                       </div>

                    </div>
                </div>
            </div>
        </div>


    </section>
</form>
@stop


@section('css')

@stop

@section('js')
<script>
    
  
    
</script>
@stop
