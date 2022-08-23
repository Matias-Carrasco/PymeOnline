<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resena extends Model
{
    protected $table = 'resenas';

    protected $primarykey = 'resena_id';

    protected $fillable = [
        'publicacion_id',
        'resena_califacion',
        'resena_texto'
    ];
}
