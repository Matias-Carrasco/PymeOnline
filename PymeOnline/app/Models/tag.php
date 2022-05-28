<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $table = 'tags';

    protected $primarykey = 'tag_id';

    protected $fillable = [
        'tag_nombre'
    ];
}
