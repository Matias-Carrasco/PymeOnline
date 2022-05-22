<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_direccions', function (Blueprint $table) {
            $table->id('cliente_direccion_id');
            $table->bigInteger('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('direccion_id')->on('direccions');
            $table->bigInteger('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('cliente_id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente_direccions');
    }
}
