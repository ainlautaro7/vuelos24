<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servicio extends Model
{
    protected $table = 'servicio';
    protected $idServicio;
    protected $descripcion;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'idServicio',
        'descripcion',
    ];
}
