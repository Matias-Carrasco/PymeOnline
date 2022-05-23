<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineaComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_compras', function (Blueprint $table) {
            $table->id('linea_compra_id')->unsigned();
            $table->primary('linea_compra_id');
            $table->id('compra_id')->unsigned();
            $table->foreign('compra_id')->references('compra_id')->on('compras');
            $table->id('publicacion_id')->unsigned();
            $table->foreign('publicacion_id')->references('publicacions_id')->on('publicacions');
            $table->bigInteger('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_compras');
    }
}
