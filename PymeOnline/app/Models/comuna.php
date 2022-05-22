<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class comuna extends Model
{
    public function up()
    {
        Schema::create('ciudads', function (Blueprint $table) {
            $table->id('ID_ciudad');
            $table->bigInteger('ID_region')->unsigned();
            $table->foreign('ID_region')->references('ID_region')->on('regions');
            $table->String('Nombre_c');
        });
    }

    
}
