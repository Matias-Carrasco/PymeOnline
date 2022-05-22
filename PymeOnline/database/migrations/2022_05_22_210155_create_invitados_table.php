<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->id('invitado_id');
            $table->bigInteger('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('direccion_id')->on('direccions');
            $table->String('invitado_rut');
            $table->String('invitado_nombre');
            $table->String('invitado_apellido');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitados');
    }
}
