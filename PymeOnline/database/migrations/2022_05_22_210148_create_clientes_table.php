<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('cliente_id');
            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios');
            $table->String('cliente_rut')->unique();
            $table->String('cliente_nombre');
            $table->String('cliente_apellido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
