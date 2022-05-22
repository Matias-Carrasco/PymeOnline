<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
class region extends Model
{
    
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id('region_id');
            $table->String('region_nombre');            
        });
    }
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}



