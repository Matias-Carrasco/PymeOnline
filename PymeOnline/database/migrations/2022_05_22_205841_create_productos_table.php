<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigInteger('producto_id')->unsigned();
            $table->primary('producto_id');
            $table->bigInteger('tienda_id')->unsigned();
            $table->foreign('tienda_id')->references('tienda_id')->on('tiendas');
            $table->string('producto_nombre');
            $table->string('producto_descripcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
