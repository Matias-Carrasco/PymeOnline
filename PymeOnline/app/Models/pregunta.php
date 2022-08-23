<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    protected $primaryKey='pregunta_id';
    public $timestamps = false;

    public function respuestas()
    {
        return $this->HasMany(Respuesta::class, 'pregunta_id');
    }
}
