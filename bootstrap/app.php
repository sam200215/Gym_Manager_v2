<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
/**
 * Esta función recupera una lista de usuarios de la base de datos.
 *
 * @param int $limit El número máximo de usuarios a recuperar.
 * @param int $offset El número de usuarios a omitir antes de comenzar a recopilar el conjunto de resultados.
 * @return array Un array de usuarios.
 * @throws Exception Si hay un error al conectar con la base de datos.
 */
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
