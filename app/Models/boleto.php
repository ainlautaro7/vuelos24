<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class boleto extends Model
{
    protected $table = 'boleto';
    protected $primaryKey = 'nroBoleto';

    protected $nroVuelo;
    protected $nroBoleto;
    protected $codCliente;
    protected $apellidoPasajero;
    protected $nombrePasajero;
    protected $documentoPasajero;
    protected $claseBoleto;
    protected $tarifaBoleto;
    protected $tipoBoleto;
    protected $estadoBoleto;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nroBoleto',
        'nroVuelo',
        'unCliente',
        'apellidoPasajero',
        'nombrePasajero',
        'documentoPasajero',
        'claseBoleto',
        'tarifaBoleto',
        'tipoBoleto',
        'estadoBoleto',
    ];

    public function cargarDatos(){}
}
