<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// El "." se utiliza como separador de carpetas
// la vista "administrarVuelos" se encuentra en "Empleado/administrarVuelos"
// entonces accedemos ella con un "Empleado.view"

// RUTAS COMPARTIDAS
Route::get('/login', [UsuarioController::class, 'loginView'])->name('usuario.loginView')->middleware('guest');

// formularios
Route::post('registroUsuario', [UsuarioController::class, 'altaUsuario'])->name('usuario.alta');
Route::get('iniciarSesion', [UsuarioController::class, 'login'])->name('usuario.iniciarSesion');
Route::get('cerrarSesion', [UsuarioController::class, 'cerrarSesion'])->name('usuario.cerrarSesion')->middleware('auth');

// ----------------------------RUTAS DEL CLIENTE---------------------------- //
Route::get('/', [ClienteController::class, 'inicioView'])->name('cliente.inicioView');
Route::get('/registrarse', [ClienteController::class, 'registrarseView'])->name('cliente.registrarseView')->middleware('guest');
Route::get('/listarVuelos', [ClienteController::class, 'listarVuelosView'])->name('cliente.listarVuelos');
Route::get('/perfil', [ClienteController::class, 'perfilView'])->name('cliente.perfil');

// formulario de compra reserva
Route::get('/formulario',[ClienteController::class, 'formularioCompraReservaView'])->name('cliente.formulario');

// formularios
Route::post('buscarVuelos', [VueloController::class, 'buscarVuelos'])->name('vuelo.buscar');
Route::post('comprarReservarBoleto', [ClienteController::class, 'comprarReservarBoleto'])->name('cliente.comprarReservarBoleto');

Route::post('comprarBoleto', [ClienteController::class, 'comprarBoleto'])->name('cliente.comprarBoleto');
Route::get('comprarBoleto', [ClienteController::class, 'comprarBoleto'])->name('cliente.comprarBoleto');

Route::post('reserva', [ClienteController::class, 'reservarBoleto'])->name('cliente.reserva');

// Route::POST('/cpm', [PaymentController::class, 'process_payment'])->name('cliente.comprarBoleto');

// ----------------------------RUTAS SISTEMA DE GESTION---------------------------- //
Route::get('/gestion', [EmpleadoController::class, 'gestionView'])->name('empleado.gestionView')->middleware('auth');

// reportes
Route::get('/gestion/reportes', [EmpleadoController::class, 'reportesView'])->name('empleado.reportesView')->middleware('auth');

// administrar vuelo
Route::get('/gestion/administrarVuelos', [VueloController::class, 'administrarVuelosView'])->name('vuelo.administrarVuelos')->middleware('auth');
Route::get('/gestion/administrarVuelos/nuevoVuelo', [VueloController::class, 'altaVueloView'])->name('vuelo.altaVuelo')->middleware('auth');
Route::get('/gestion/administrarVuelos/modificarVuelo/{vuelo}', [VueloController::class, 'modificarVueloView'])->name('vuelo.modificarVuelo')->middleware('auth');
Route::get('/gestion/administrarVuelos/reasignarPasajeros/{vuelo}', [VueloController::class, 'reasignarPasajerosView'])->name('vuelo.reasignarPasajeros')->middleware('auth');

// administrar empleado
Route::get('/gestion/administrarEmpleados', [EmpleadoController::class, 'administrarEmpleadosView'])->name('empleado.administrarEmpleados');
Route::get('/gestion/administrarEmpleados/nuevoEmpleado', [EmpleadoController::class, 'altaEmpleadoView'])->name('empleado.altaEmpleado');

// formularios
Route::post('altaVuelo', [VueloController::class, 'altaVuelo'])->name('vuelo.alta');
Route::post('modificarVuelo', [VueloController::class, 'modificarVuelo'])->name('vuelo.modificar');
Route::put('iniciarVuelo', [VueloController::class, 'iniciarVuelo'])->name('vuelo.iniciar');
Route::put('finalizarVuelo', [VueloController::class, 'finalizarVuelo'])->name('vuelo.finalizar');
Route::put('reasignarPasajeros', [VueloController::class, 'reasignarPasajeros'])->name('vuelo.reasignarPasajeros');

//Pruebo email
Route::get('/enviar', [MailController::class, 'sendEmail']);

//PDF'S
Route::get('/compraReservaPdf', [ClienteController::class, 'pdfCompraReserva'])->name('PDFs.compraReserva');