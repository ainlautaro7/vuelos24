<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelo', function (Blueprint $table) {
            $table->increments('nroVuelo');
            $table->integer('idCiudadOrigen')->unsigned();
            $table->integer('idCiudadDestino')->unsigned();
            $table->string('fechaVuelo');
            $table->string('horaVuelo');
            $table->string('planVuelo');
            $table->string('estadoVuelo');

            $table->foreign('idCiudadOrigen')->references('idCiudad')->on('ciudad');
            $table->foreign('idCiudadDestino')->references('idCiudad')->on('ciudad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vuelo');
    }
}
