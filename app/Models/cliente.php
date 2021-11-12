<?php

namespace App\Models;

use App\Models\User as Usuario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Usuario
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $table = 'cliente'; 
    protected $primaryKey = 'codCliente';

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
    protected $tipoUsuario;

    protected $fillable = [
        'codCliente',
        'nombre',
        'apellido',
        'nroDocumento',
        'fechaNacimiento',
        'email',
        'telefono',
        'usuario',
        'password',
        'tipoUsuario'
    ];

    // FUNCIONES DEL SISTEMA
    protected function comprarBoleto(){

    }

    protected function cancelarCompra(){

    }

    protected function reservarBoleto(){

    }

    protected function cancelarReserva(){
        
    }
}
