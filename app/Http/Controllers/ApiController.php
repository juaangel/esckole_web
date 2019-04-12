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
            $califsMateria = [];

            $materia_califs = $materia->calificaciones()->get()
                ->where('matricula_alumno', $alumno->matricula);

            for($i = 0; $i < $materia_califs->count(); $i++){
                if($materia_califs->get($i) != null){
                    if($i == 0)
                    array_push($califsMateria, $materia->nom);

                    array_push($califsMateria, $materia_califs->get($i)->calificacion);
                }
            }

            $calificacionesAll->push($califsMateria);
        }

        return json_encode(['calificaciones' => $calificacionesAll->toArray()]);
    }
}
