<?php

use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\EmpleadoController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::controller(RestauranteController::class)->group(function(){
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

// Route::controller(RestauranteController::class)->group(function(){
//         Route::get('/restaurantes', 'index');
//         Route::post('/restaurante', 'new');
//         Route::put('/restaurante/{id}', 'update');
//         Route::delete('/restaurante/{id}', 'destroy');
//     });