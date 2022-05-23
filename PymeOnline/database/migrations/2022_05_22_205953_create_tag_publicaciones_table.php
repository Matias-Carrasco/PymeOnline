<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagPublicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_publicaciones', function (Blueprint $table) {
            $table->bigIncrements('tag_publicacion_id');
            $table->foreignId('tag_id')->constrained('tags');
            $table->foreignId('publicacion_id')->constrained('publicacions');
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
        Schema::dropIfExists('tag_publicaciones');
    }
}
