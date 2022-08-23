@foreach($respuestas as $respuesta)
    <div class="display-comment" style="margin-left:40px;">
        <p>Respuesta: {{ $respuesta->respuesta_texto }} </p>
        <a href="" id="reply"></a>
    </div>
@endforeach