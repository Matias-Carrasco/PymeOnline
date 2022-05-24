<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendaEstilosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tienda_estilos', function (Blueprint $table) {
           $table->id('estilo_id');
           $table->String("tienda_banner_url");
           $table->String('tienda_color_principal');
           $table->String('tienda_color_secundario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tienda_estilos');
    }
}
