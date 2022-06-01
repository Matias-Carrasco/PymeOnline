<form action="{{ route('tags.update', $tag->tag_id) }}" method="post" enctype="multipart/form-data">
    @csrf
    {{ method_field('PATCH')}}
    <!-- Modal -->
    <div class="modal fade" id="ModalEditar{{$tag->tag_id}}" tabindex="-1" role="dialog" aria-labelledby="ModalEditarTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Editar tag</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="tag_nombre"> Nombre</label>
                        <lavel for="tag_nombre" class="text-danger"> *campo obligatorio</lavel>
                        <input type="text" class="form-control {{$errors->has('tag_nombre')?'is-invalid':''}} " name="tag_nombre" value="{{isset($tag->tag_nombre)?$tag->tag_nombre:old('tag_nombre') }}" id="tag_nombre">

                        {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}
                        <!--Si se encuentra un error en ese campo mostrara el mensaje de error-->
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>

            </div>
        </div>
    </div>

</form>