<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\producto;

class CreateImagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->id('imagen_id');
            $table->bigInteger('producto_id')->unsigned();
            $table->foreign('producto_id')->references('producto_id')->on('productos');
            $table->string('imagen_url');
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
        Schema::dropIfExists('imagens');
    }
}
