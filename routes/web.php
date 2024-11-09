<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('rols', App\Http\Controllers\RolController::class);
Route::resource('permisos', App\Http\Controllers\PermisoController::class);
Route::resource('rolporpermisos', App\Http\Controllers\RolPorPermisoController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('membresias', App\Http\Controllers\MembresiaController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('pagos', App\Http\Controllers\PagoController::class);
Route::resource('pagodetalls', App\Http\Controllers\PagodetallController::class);
Route::resource('bitacoracambios', App\Http\Controllers\BitacoracambioController::class);
