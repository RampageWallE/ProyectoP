<?php

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

Route::resource('restaurantes', RestauranteController::class)
        ->only(['index', 'show', 'store', 'update', 'destroy']);

Route::resource('reservas', RestauranteController::class)
        ->only(['index', 'show', 'store', 'update', 'destroy']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
