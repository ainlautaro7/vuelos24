<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class serviciosVuelo extends Model
{
    protected $table = 'serviciosvuelo';
    protected $primaryKey = 'nroVuelo';

    protected $nroVuelo;
    protected $idServicio;

    protected $fillable = [
        'idServicio',
        'descripcion',
    ];
}
