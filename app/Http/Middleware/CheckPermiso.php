<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class CheckPermiso
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permiso
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $permiso)
{
    // Asignar a $user para mayor claridad
    /** @var User $user */
    $user = Auth::user();

    // Verificar permisos de usuario
    if (!$user || !$user->hasPermiso($permiso)) {
        abort(403, 'No tienes permiso para acceder a esta sección.');
    }

    return $next($request);
}
}

