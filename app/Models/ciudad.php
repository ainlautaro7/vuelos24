<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ciudad extends Model
{
    protected $table = 'ciudad';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'idCiudad',
        'codigoIATACiudad',
        'nombre',
    ];
}
