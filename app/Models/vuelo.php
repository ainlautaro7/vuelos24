<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vuelo extends Authenticatable
{
    protected $table = 'vuelo'; 
    protected $primaryKey = 'nroVuelo';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nroVuelo',
        'ciudadOrigen',
        'ciudadDestino',
        'horaVuelo',
        'fechaVuelo',
        'planVuelo',
        'estadoVuelo',
    ];
}
