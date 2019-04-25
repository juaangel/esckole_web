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
        $califList_final = collect([]);

        $alumno = $r->get('usuario')->persona->alumno;

        $lastGroup = $alumno->grupos()
            ->orderBy('grado', 'DESC')
            ->get()->first();

        $materias = Materia::where('grado', $lastGroup->grado)
            ->orderBy('nom')->get();

        foreach($materias as $materia){
            $materiaCalifs = $materia->calificaciones()
                ->where('matricula_alumno', $alumno->matricula)
                ->orderBy('unidad')->pluck('calificacion');

            $califList_final->push(
                json_encode(['nom' => $materia->nom,
                             'prom' => $materiaCalifs->avg(),
                             'califs' => $materiaCalifs->toArray()])
            );
        }

        return $califList_final->toArray();
    }
}
