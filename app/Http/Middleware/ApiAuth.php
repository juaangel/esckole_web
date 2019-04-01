<?php

namespace App\Http\Middleware;

use App\Models\Alumno;
use App\Models\Empleado;

use Closure;

class ApiAuth
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
