<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    protected $table = 'categorias';

    protected $primarykey = 'categoria_id';
    protected $fillable = [
        'tienda_id',
        'categoria_nombre'
    ];
}
