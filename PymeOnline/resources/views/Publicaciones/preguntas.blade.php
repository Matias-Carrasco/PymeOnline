@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
<ul>    
    @foreach( $errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
</ul>
</div>
@endif

<div class="container card">
<h4>Añadir pregunta</h4>
                    <form method="post" action="{{ route('pregunta.store') }}">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="publicacion_id" value="{{ $publicacion_id }}" />
                            <textarea class="form-control" name="pregunta_texto"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Preguntar" />
                        </div>
                    </form>
                    
</div>

<div class="display comment">
<h1 style="margin-left:250px;">Preguntas y respuestas</h1>
@foreach($preguntas as $pregunta)
    <div class="container card">
        <p>{{$pregunta->pregunta_fecha }} </p>
        <p>Pregunta: {{ $pregunta->pregunta_texto }} </p>
        <a href="" id="reply"></a>
            <hr />
        </form>
        @include('Publicaciones.respuestas', ['respuestas' => $pregunta->respuestas, 'pregunta_id' => $pregunta->pregunta_id])
        <form method="post" action="{{ route('respuesta.store') }}">
            @csrf
            <div class="form-group">
                <textarea type="text" name="respuesta_texto" class="form-control"></textarea>
                <input type="hidden" name="pregunta_id" value="{{ $pregunta->pregunta_id }}" />
            </div>
           
        <div class="form-group">
                <input type="submit" class="btn btn-success" value="Responder" />
        </div>
    </div>
@endforeach
</div>