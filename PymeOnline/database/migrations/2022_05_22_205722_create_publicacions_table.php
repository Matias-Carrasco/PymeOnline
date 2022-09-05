<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class CreatePublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id('publicacion_id');
            $table->integer('tienda_id')->references('tienda_id')->on('tiendas');
            $table->integer('producto_id')->references('producto_id')->on('productos');
            $table->integer('categoria_id')->references('categoria_id')->on('categorias')->nullable();
            $table->boolean('pulicacion_activo');
            $table->char('publicacion_titulo', 60);
            $table->integer('publicacion_precio');
            $table->float('publicacion_oferta_porcentual');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacions');
    }
}
