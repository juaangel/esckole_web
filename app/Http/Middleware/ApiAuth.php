<?php

namespace App\Http\Middleware;

use App\Models\Alumno;
use App\Models\Empleado;

use Closure;

class ApiAuth
{
    public function handle($request, Closure $next)
    {
        foreach(Usuario::all() as $user)
            if($request->get('api_token') == $user->api_token)
                return $next($request);
    }
}
