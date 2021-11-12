<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario'; 
    protected $primaryKey = 'idUsuario';

    protected $nombre;
    protected $apellido;
    protected $nroDocumento;
    protected $fechaNacimiento;
    protected $email;
    protected $telefono;
    protected $usuario;
    protected $password;
    protected $tipoUsuario;

    protected $fillable = [
        'nombre',
        'apellido',
        'nroDocumento',
        'fechaNacimiento',
        'email',
        'telefono',
        'usuario',
        'password',
        'tipoUsuario',
    ];

    // FUNCIONES DEL SISTEMA
    protected function login(){

    }

    protected function modificarPerfil(){

    }


    // FUNCIONES PRE-DEFINIDAS
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
