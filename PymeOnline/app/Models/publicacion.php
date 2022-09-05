<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicacion extends Model
{
   protected $table = 'publicacions';
   protected $primaryKey = 'publicacion_id';
   protected $fillable = [
      'publicacion_id',
      'tienda_id',
      'producto_id',
      'categoria_id',
      'publicacion_activo',
      'publicacion_titulo',
      'publicacion_precio',
      'publicacion_oferta_porcentual'
      
   ];
   public function preguntas()
   {
      return $this->hasMany(pregunta::class, 'publicacion_id');
   }
}
