<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asignacion_materias;
use App\Models\Calificaciones;
use App\Models\Carrera;
use App\Models\Empleado;
use App\Models\Inf_contacto;
use App\Models\Inf_salud;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Materia_unidad;
use App\Models\Persona;
use App\Models\TipoEmpleado;
use App\Models\Usuario;

use App\Objects\AlumnoDatos;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function prueba(){
        /*Insertar usuario
        $usuario = new Usuario;

        $usuario->id = 9;
        $usuario->pass = Hash::make("1234");
        $usuario->api_token = Hash::make(Str::random(60));
        $usuario->save();

        //return dd(json_encode($obj));*/

        /*Persona::create([
            'nom' => 'Milhouse',
            'apeP' => 'Van',
            'apeM' => 'Houten',
            'fecha_nac' => '2002-04-21',
            'curp' => 'VAHM020421HCLNTLA9'
        ]);*/

        /*$pass = '1234';

        $usuario = Usuario::find(3);
        $usuario->pass = Hash::make($pass);
        $usuario->save();*/



        return dd("What the fuck are you doing here?");
    }
}
