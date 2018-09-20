<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('titulo',150);
            $table->string('subtitulo',500)->nullable();
            $table->string('fecha_creacion',50)->nullable();
            $table->string('seccion',50)->nullable();
            $table->integer('visitas')->nullable();
            $table->string('noticias_relacionadas',600)->nullable();
            $table->string('tags',150)->nullable();
            $table->integer('cantidad_comentarios')->nullable();
            $table->integer('cantidad_megusta')->nullable();
            $table->longText('primer_parrafo')->nullable();
            $table->longText('texto')->nullable();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias');
    }
}
