<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccions', function (Blueprint $table) {
            $table->id('direccion_id');
            $table->bigInteger('comuna_id')->unsigned();
            $table->foreign('comuna_id')->references('comuna_id')->on('comunas');
            $table->String('direccion_nombre');
            $table->String('direccion_calle');
            $table->integer('direccion_numero');
            $table->String('direccion_detalles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccions');
    }
}
