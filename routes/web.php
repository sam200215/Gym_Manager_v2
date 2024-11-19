<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    // Rutas de administración
    Route::middleware(['check.permiso:gestionar-roles'])->group(function () {
        Route::resource('rols', App\Http\Controllers\RolController::class);
        Route::resource('permisos', App\Http\Controllers\PermisoController::class);
        Route::resource('rolporpermisos', App\Http\Controllers\RolporpermisoController::class);
        Route::resource('users', UserController::class);
    });

    // Rutas de gestión de clientes
    Route::middleware(['check.permiso:gestionar-clientes'])->group(function () {
        Route::resource('clientes', App\Http\Controllers\ClienteController::class);
        Route::resource('membresias', App\Http\Controllers\MembresiaController::class);
    });

    // Rutas de empleados
    Route::middleware(['check.permiso:gestionar-empleados'])->group(function () {
        Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
    });

    // Rutas de pagos
    Route::middleware(['check.permiso:gestionar-pagos'])->group(function () {
        Route::resource('pagos', App\Http\Controllers\PagoController::class);
        Route::resource('pagodetalls', App\Http\Controllers\PagodetallController::class);
    });

    // Rutas de bitácora
    Route::middleware(['check.permiso:ver-bitacora'])->group(function () {
        Route::resource('bitacoracambios', App\Http\Controllers\BitacoracambioController::class);
    });
});