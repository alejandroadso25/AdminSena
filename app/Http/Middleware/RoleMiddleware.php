<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Permite continuar solo si el usuario tiene uno de los roles indicados.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // auth middleware debe ejecutarse antes; esta comprobación agrega una defensa adicional.
        if (! $request->user() || ! in_array($request->user()->role, $roles, true)) {
            // El usuario autenticado no tiene permisos para este recurso.
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}