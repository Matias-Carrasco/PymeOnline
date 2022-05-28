<br>
<h4>{{ $modo }} Tag</h4>
<br>

<body>
    <p class="text-danger">* Indica campo obligatorio</p>
    <br>

    <div class="form-group">
        <label for="tienda_id">Placeholder: Tienda</label>
        <lavel for="tienda_id" class="text-danger"> *</lavel>

        <select class="form-control" name="tienda_id" id="tienda_id">
            <option selected disabled value="">--Seleccione Id Tienda--</option>
            @foreach($tiendas as $tienda)
            <option value="{{ $tienda->tienda_id }}" 
                @if (isset($tag->tag_id) && $tag->tienda_id == $tienda->tienda_id) selected @endif
                >{{$tienda->tienda_id}}
            </option>
            @endforeach
        </select>
        <br>
    </div>

    <div class="form-group">
        <label for="tag_nombre"> Nombre Tag</label>
        <lavel for="tag_nombre" class="text-danger"> *</lavel>
        <input type="text" class="form-control {{$errors->has('tag_nombre')?'is-invalid':''}} " name="tag_nombre" value="{{isset($tag->tag_nombre)?$tag->tag_nombre:old('tag_nombre') }}" id="tag_nombre">

        {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
        <!--Si se encuentra un error en ese campo mostrara el mensaje de error-->

        <br>
    </div>

    <input class="btn btn-success" type="submit" value="{{ $modo }} datos">

    <a class="btn btn-primary" href="{{url('tags/')}}"> Regresar </a>

    <br><br>
</body>