<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boleto', function (Blueprint $table) {
            // $table->incremets('idBoleto');
            $table->integer('nroVuelo');
            $table->integer('nroBoleto');
            $table->integer('codCliente')->unsigned();

            $table->string('apellidoPasajero');
            $table->string('nombrePasajero');
            $table->string('documentoPasajero');
            $table->string('claseBoleto');
            $table->string('tarifaBoleto');
            $table->string('tipoBoleto');
            $table->string('estadoBoleto');

            $table->foreign('codCliente')->references('codCliente')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boleto');
    }
}
