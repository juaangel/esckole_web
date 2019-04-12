<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificaciones;
use App\Models\Materia;
use App\Models\Materia_unidad;
use App\Models\Usuario;
use App\Objects\AlumnoDatos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    function login(Request $r){
        $num = $r->get('num');
        $pass = $r->get('pass');

        $user = Alumno::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass))
                return json_encode(
                    ["api_token" => $user->persona->usuario->api_token]
                );

        return json_encode(["api_token" => "false"]);
    }

    function datosAlumno(Request $r){
        $matri = $r->get('usuario')->persona->alumno->matricula;

        return (new AlumnoDatos($matri))->toJson();
    }

    function calificaciones(Request $r){
        $alumno = $r->get('usuario')->persona->alumno;

        $grupo = $alumno->grupos()
            ->orderBy('grado', 'DESC')
            ->get()->first();

        $materias = Materia::where('grado', $grupo->grado)->get();

        $calificacionesAll = collect([]);

        foreach($materias as $materia){
            //$califsMateria = [collect([])];
            $califsMateria = [];

            $mat_calificaciones = $materia->calificaciones()->get()
                ->where('matricula_alumno', $alumno->matricula);

            foreach($mat_calificaciones as $calificacion){
                //$califsMateria->push($calificacion->calificacion);
                array_push($califsMateria, $calificacion->calificacion);
            }

            $calificacionesAll->prepend($califsMateria, $materia->nom);
        }

        return json_encode(['calificaciones' => $calificacionesAll->toArray()]);
    }
}
