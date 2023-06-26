<?php

use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\ConsultaController;
use App\Http\Controllers\Api\EmpleadoController;
use App\Http\Controllers\Api\ReservaController;
use App\Http\Controllers\Api\RegistroRespuestaController;
use App\Http\Controllers\Api\RestauranteController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('restaurantes', RestauranteController::class)
//         ->only(['index', 'show', 'store', 'update', 'destroy']);

// Route::resource('reservas', RestauranteController::class)
//         ->only(['index', 'show', 'store', 'update', 'destroy']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','admin'])->group(function(){

});
Route::controller(RestauranteController::class)->group(function(){
    Route::get('/home','index2')->name('home');
    Route::get('restaurantes','index')->name('restaurantes.view');
    Route::get('restaurante/create','create')->name('restaurante.create');
    Route::get('restaurante/{id}/editar','editar')->name('restaurante.editar');
    Route::put('restaurante/{id}/update','update')->name('restaurante.update');
    Route::delete('restaurante/{id}/destroy','destroy')->name('restaurante.delete');
    Route::post('restaurante/insert','insert')->name('restaurante.sendData');
});

Route::controller(EmpleadoController::class)->group(function(){
    Route::get('empleados','index')->name('empleados.view');
    Route::get('empleado/create','create')->name('empleado.create');
    Route::get('empleado/{id}/editar','editar')->name('empleado.editar');
    Route::put('empleado/{id}/update','update')->name('empleado.update');
    Route::delete('empleado/{id}/destroy','destroy')->name('empleado.delete');
    Route::post('empleado/insert','insert')->name('empleado.sendData');
});

Route::controller(ClienteController::class)->group(function(){
    Route::get('clientes','index')->name('clientes.view');
    Route::get('cliente/create','create')->name('cliente.create');
    Route::get('cliente/{id}/editar','editar')->name('cliente.editar');
    Route::put('cliente/{id}/update','update')->name('cliente.update');
    Route::delete('cliente/{id}/destroy','destroy')->name('cliente.delete');
    Route::post('cliente/insert','insert')->name('cliente.sendData');
});

Route::controller(ReservaController::class)->group(function(){
    Route::get('reservas','index')->name('reservas.view');
    Route::get('reserva/{id_restaurante}/create','create')->name('reserva.create');
    Route::get('reserva/{id}/editar','editar')->name('reserva.editar');
    Route::put('reserva/{id}/update','update')->name('reserva.update');
    Route::delete('reserva/{id}/destroy','destroy')->name('reserva.delete');
    Route::post('reserva/{id_restaurante}/insert','insert')->name('reserva.sendData');
});

Route::controller(ConsultaController::class)->group(function(){
    Route::get('consultas','index')->name('consultas.view');
    Route::get('consulta/create','create')->name('consulta.create');
    Route::get('consulta/{id}/editar','editar')->name('consulta.editar');
    Route::put('consulta/{id}/update','update')->name('consulta.update');
    Route::delete('consulta/{id}/destroy','destroy')->name('consulta.delete');
    Route::post('consulta/insert','insert')->name('consulta.sendData');
});

Route::controller(RegistroRespuestaController::class)->group(function(){
    Route::get('registro_respuestas','index')->name('rrespuestas.view');
    Route::get('registro_respuesta/{id_consulta}/responder','create')->name('rrespuesta.create');
    Route::get('registro_respuesta/{id_consulta}/editar','editar')->name('rrespuesta.editar');
    Route::put('registro_respuesta/{id_consulta}/update','update')->name('rrespuesta.update');
    Route::delete('registro_respuesta/{id_consulta}/destroy','destroy')->name('rrespuesta.delete');
    Route::post('registro_respuesta/{id_consulta}/insert','insert')->name('rrespuesta.sendData');
});