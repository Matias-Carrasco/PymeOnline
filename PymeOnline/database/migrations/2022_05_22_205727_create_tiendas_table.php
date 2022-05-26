<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id('tienda_id');
            $table->bigInteger('estilo_id')->unsigned();
            $table->foreign('estilo_id')->references('estilo_id')->on('tienda_estilos');
            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('usuario_id')->on('users');
            $table->bigInteger('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('direccion_id')->on('direccions');
            $table->String('tienda_rut_responsable')->unique();
            $table->String('tienda_nombre_responsable');
            $table->String('tienda_primer_apellido_responsable');
            $table->String('tienda_segundo_apellido_responsable');
            $table->String('tienda_nombre')->unique();
            $table->String('tienda_numero_contacto');
            $table->String('tienda_mail_contacto')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tiendas');
    }
}
