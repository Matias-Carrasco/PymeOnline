<a href="{{url('tienda')}}"> < Volver</a><br>
<label for="estilo_id"> ID del Estilo</label>
<input type="text" name="estilo_id" value="{{ isset($perfil->estilo_id)?$perfil->estilo_id:''}}" id="estilo_id">
<br>
<label for="direccion_id"> ID de Dirección</label>
<input type="text" name="direccion_id" value="{{ isset($perfil->direccion_id)?$perfil->direccion_id:''}}" id="direccion_id">
<br>
<label for="tienda_rut_responsable"> RUT de Responsable</label>
<input type="text" name="tienda_rut_responsable" value="{{ isset($perfil->tienda_rut_responsable)?$perfil->tienda_rut_responsable:''}}" id="tienda_rut_responsable">
<br>
<label for="tienda_nombre_responsable"> Nombre de Responsable</label>
<input type="text" name="tienda_nombre_responsable" value="{{ isset($perfil->tienda_nombre_responsable)?$perfil->tienda_nombre_responsable:''}}" id="tienda_nombre_responsable">
<br>
<label for="tienda_primer_apellido_responsable"> Primer Apellido de Responsable</label>
<input type="text" name="tienda_primer_apellido_responsable" value="{{ isset($perfil->tienda_primer_apellido_responsable)?$perfil->tienda_primer_apellido_responsable:'' }}" id="tienda_primer_apellido_responsable">
<br>
<label for="tienda_segundo_apellido_responsable"> Segundo Apellido de Responsable</label>
<input type="text" name="tienda_segundo_apellido_responsable" value="{{ isset($perfil->tienda_segundo_apellido_responsable)?$perfil->tienda_segundo_apellido_responsable:'' }}" id="tienda_segundo_apellido_responsable">
<br>
<label for="tienda_nombre"> Nombre de la tienda</label>
<input type="text" name="tienda_nombre" value="{{ isset($perfil->tienda_nombre)?$perfil->tienda_nombre:'' }}" id="tienda_nombre">
<br>
<label for="tienda_numero_contacto"> Numero de contacto</label>
<input type="text" name="tienda_numero_contacto" value="{{ isset($perfil->tienda_numero_contacto)?$perfil->tienda_numero_contacto:''}}" id="tienda_numero_contacto">
<br>
<label for="tienda_mail_contacto"> Correo de contacto</label>
<input type="text" name="tienda_mail_contacto" value="{{ isset($perfil->tienda_mail_contacto)?$perfil->tienda_mail_contacto:''}}" id="tienda_mail_contacto">
<br>
<input type="submit" value="Guardar datos"> <br>