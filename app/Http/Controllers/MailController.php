<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details=[
            'title' => 'Correo de prueba vuelos24',
            'body' => 'Este es un ejemplo para enviar'
        ];
        Mail::to("vuelos24.unpsjb@gmail.com")->send(new TestMail($details)); //Acá se pone el mail al que va a ser enviado el correo
        return "Correo electrónico enviado";
    }
}
