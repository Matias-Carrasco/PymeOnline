<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('compra_id')->unsigned();
            $table->primary('compra_id');
            $table->bigInteger('tienda_id')->unsigned();
            $table->foreign('tienda_id')->references('tienda_id')->on('tiendas');
            $table->id('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('cliente_id')->on('clientes');
            $table->id('invitado_id')->unsigned();
            $table->foreign('invitado_id')->references('invitado_id')->on('invitados');
            $table->bigInteger('compra_precio');
            $table->date('compra_fecha');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
