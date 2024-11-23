<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas públicas
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Rutas de perfil
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])
        ->name('profile.edit');
        
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])
        ->name('profile.update');
        
    Route::put('/profile/password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])
        ->name('profile.password');

    // Rutas de administración
    Route::middleware(['check.permiso:gestionar-roles'])->group(function () {
        // Roles
        Route::get('rols/create', [App\Http\Controllers\RolController::class, 'create'])->name('rols.create');
        Route::post('rols', [App\Http\Controllers\RolController::class, 'store'])->name('rols.store');
        Route::get('rols', [App\Http\Controllers\RolController::class, 'index'])->name('rols.index');
        Route::get('rols/{rol}/edit', [App\Http\Controllers\RolController::class, 'edit'])->name('rols.edit');
        Route::match(['put', 'patch'],'rols/{rol}', [App\Http\Controllers\RolController::class, 'update'])->name('rols.update');
        Route::get('rols/{rol}', [App\Http\Controllers\RolController::class, 'show'])->name('rols.show');
        Route::delete('rols/{rol}', [App\Http\Controllers\RolController::class, 'destroy'])->name('rols.destroy');

        // Permisos
        Route::get('permisos/create', [App\Http\Controllers\PermisoController::class, 'create'])->name('permisos.create');
        Route::post('permisos', [App\Http\Controllers\PermisoController::class, 'store'])->name('permisos.store');
        Route::get('permisos', [App\Http\Controllers\PermisoController::class, 'index'])->name('permisos.index');
        Route::get('permisos/{permiso}/edit', [App\Http\Controllers\PermisoController::class, 'edit'])->name('permisos.edit');
        Route::match(['put', 'patch'],'permisos/{permiso}', [App\Http\Controllers\PermisoController::class, 'update'])->name('permisos.update');
        Route::get('permisos/{permiso}', [App\Http\Controllers\PermisoController::class, 'show'])->name('permisos.show');
        Route::delete('permisos/{permiso}', [App\Http\Controllers\PermisoController::class, 'destroy'])->name('permisos.destroy');

        // Roles por Permisos
        Route::get('rolporpermisos/create', [App\Http\Controllers\RolporpermisoController::class, 'create'])->name('rolporpermisos.create');
        Route::post('rolporpermisos', [App\Http\Controllers\RolporpermisoController::class, 'store'])->name('rolporpermisos.store');
        Route::get('rolporpermisos', [App\Http\Controllers\RolporpermisoController::class, 'index'])->name('rolporpermisos.index');
        Route::get('rolporpermisos/{rolporpermiso}/edit', [App\Http\Controllers\RolporpermisoController::class, 'edit'])->name('rolporpermisos.edit');
        Route::put('rolporpermisos/{rolporpermiso}', [App\Http\Controllers\RolporpermisoController::class, 'update'])->name('rolporpermisos.update');
        Route::get('rolporpermisos/{rolporpermiso}', [App\Http\Controllers\RolporpermisoController::class, 'show'])->name('rolporpermisos.show');
        Route::delete('rolporpermisos/{rolporpermiso}', [App\Http\Controllers\RolporpermisoController::class, 'destroy'])->name('rolporpermisos.destroy');
    });

    // Rutas de usuarios
    Route::middleware(['check.permiso:gestionar-usuarios'])->group(function () {
        Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        Route::get('users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
        Route::match(['put', 'patch'],'users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
        Route::get('users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
        Route::delete('users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    });

    // Rutas de clientes
    Route::middleware(['check.permiso:ver-clientes'])->group(function () {
        Route::get('clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.index');
    });

    Route::middleware(['check.permiso:crear-clientes'])->group(function () {
        Route::get('clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
        Route::post('clientes', [App\Http\Controllers\ClienteController::class, 'store'])->name('clientes.store');
    });

    Route::middleware(['check.permiso:editar-clientes'])->group(function () {
        Route::get('clientes/{cliente}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
        Route::match(['put', 'patch'], 'clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
    });

    Route::middleware(['check.permiso:ver-clientes'])->group(function () {
        Route::get('clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'show'])->name('clientes.show');
    });

    Route::middleware(['check.permiso:eliminar-clientes'])->group(function () {
        Route::delete('clientes/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.destroy');
    });

    // Rutas de membresías
    Route::middleware(['check.permiso:ver-membresias'])->group(function () {
        Route::get('membresias', [App\Http\Controllers\MembresiaController::class, 'index'])->name('membresias.index');
    });

    Route::middleware(['check.permiso:crear-membresias'])->group(function () {
        Route::get('membresias/create', [App\Http\Controllers\MembresiaController::class, 'create'])->name('membresias.create');
        Route::post('membresias', [App\Http\Controllers\MembresiaController::class, 'store'])->name('membresias.store');
    });

    Route::middleware(['check.permiso:editar-membresias'])->group(function () {
        Route::get('membresias/{membresia}/edit', [App\Http\Controllers\MembresiaController::class, 'edit'])->name('membresias.edit');
        Route::match(['put', 'patch'],'membresias/{membresia}', [App\Http\Controllers\MembresiaController::class, 'update'])->name('membresias.update');
    });

    Route::middleware(['check.permiso:ver-membresias'])->group(function () {
        Route::get('membresias/{membresia}', [App\Http\Controllers\MembresiaController::class, 'show'])->name('membresias.show');
    });

    Route::middleware(['check.permiso:eliminar-membresias'])->group(function () {
        Route::delete('membresias/{membresia}', [App\Http\Controllers\MembresiaController::class, 'destroy'])->name('membresias.destroy');
    });

    // Rutas de empleados
    Route::middleware(['check.permiso:ver-empleados'])->group(function () {
        Route::get('empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index');
    });

    Route::middleware(['check.permiso:crear-empleados'])->group(function () {
        Route::get('empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados.create');
        Route::post('empleados', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados.store');
    });

    Route::middleware(['check.permiso:editar-empleados'])->group(function () {
        Route::get('empleados/{empleado}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleados.edit');
        Route::match(['put', 'patch'],'empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleados.update');
    });

    Route::middleware(['check.permiso:ver-empleados'])->group(function () {
        Route::get('empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleados.show');
    });

    Route::middleware(['check.permiso:eliminar-empleados'])->group(function () {
        Route::delete('empleados/{empleado}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy');
    });

    // Rutas de bitácora
    Route::middleware(['check.permiso:ver-bitacora'])->group(function () {
        Route::get('bitacoracambios', [App\Http\Controllers\BitacoracambioController::class, 'index'])->name('bitacoracambios.index');
        Route::get('bitacoracambios/{bitacoracambio}', [App\Http\Controllers\BitacoracambioController::class, 'show'])->name('bitacoracambios.show');
    });

    // Rutas de pagos
    Route::middleware(['check.permiso:ver-pagos'])->group(function () {
        Route::get('pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('pagos.index');
    });

    Route::middleware(['check.permiso:crear-pagos'])->group(function () {
        Route::get('pagos/create', [App\Http\Controllers\PagoController::class, 'create'])->name('pagos.create');
        Route::post('pagos', [App\Http\Controllers\PagoController::class, 'store'])->name('pagos.store');
    });

    Route::middleware(['check.permiso:editar-pagos'])->group(function () {
        Route::get('pagos/{pago}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('pagos.edit');
        Route::match(['put', 'patch'],'pagos/{pago}', [App\Http\Controllers\PagoController::class, 'update'])->name('pagos.update');
    });

    Route::middleware(['check.permiso:ver-pagos'])->group(function () {
        Route::get('pagos/{pago}', [App\Http\Controllers\PagoController::class, 'show'])->name('pagos.show');
    });

    Route::middleware(['check.permiso:eliminar-pagos'])->group(function () {
        Route::delete('pagos/{pago}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('pagos.destroy');
    });
});
