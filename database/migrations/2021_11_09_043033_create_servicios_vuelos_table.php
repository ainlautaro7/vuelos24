<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosVuelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serviciosvuelos', function (Blueprint $table) {
            $table->id();
            $table->integer('nroVuelo')->unsigned();
            $table->integer('idServicio')->unsigned();
            $table->timestamps();

            $table->foreign('nroVuelo')->references('nroVuelo')->on('vuelo');
            $table->foreign('idServicio')->references('idServicio')->on('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serviciosvuelos');
    }
}
