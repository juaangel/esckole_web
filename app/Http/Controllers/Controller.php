<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Models\Persona;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //function prueba(){
        /*Insertar usuario
        $usuario = new Usuario;

        $usuario->id = 1;
        $usuario->pass = Hash::make("1234");
        $usuario->api_token = Hash::make(Str::random(60));
        $usuario->save();*/

        //return dd(Alumno::find(2));
    //}
}
