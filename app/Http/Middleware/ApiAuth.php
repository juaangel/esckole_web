<?php

namespace App\Http\Middleware;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Usuario;

use Closure;

class ApiAuth
{
    public function handle($request, Closure $next)
    {
        $usuario = Usuario::where('api_token', $request->get('api_token'))->get()->first();

        //dd($usuario->persona->alumno->matricula);

        if($usuario != null){
            $request->merge(['usuario' => $usuario]);
            return $next($request);
        }

        return json_encode(['isTrue' => false]);
    }
}
