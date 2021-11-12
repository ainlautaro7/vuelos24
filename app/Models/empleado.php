<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User as Usuario;

class Empleado extends Usuario
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'empleado'; 
    protected $primaryKey = 'codEmpleado';

    protected $codEmpleado;
    protected $idUsuario;
    protected $nombre;
    protected $apellido;
    protected $nroDocumento;
    protected $fechaNacimiento;
    protected $email;
    protected $telefono;
    protected $usuario;
    protected $password;
    protected $tipo_usuario;

    protected $fillable = [
        'codEmpleado',
    ];
}
