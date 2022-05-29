<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imagen extends Model
{
    protected $primaryKey='imagen_id';
    public $timestamps = false;
    protected $fillable = ['imagen_url'];
}
