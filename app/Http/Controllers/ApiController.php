<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Calificaciones;
use App\Models\Materia;
use App\Models\Materia_unidad;
use App\Models\Usuario;
use App\Objects\datosAlumno;

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

        return (new datosAlumno($matri))->toJson();
    }

    function calificaciones(Request $r){
        //Arreglo a mandar
        $califList = collect([]);

        //Datos de alumno
        $alumno = $r->get('usuario')->persona->alumno;

        //Último grupo del alumno
        $lastGroup = $alumno->grupos()
            ->orderBy('grado', 'DESC')
            ->get()->first();

        //Materias del grupo(grado) actual
        $materias = Materia::where('grado', $lastGroup->grado)
            ->orderBy('nom')->get();

        foreach($materias as $materia){
            $materiaCalifs = $materia->calificaciones()
                ->where('matricula_alumno', $alumno->matricula)
                ->orderBy('unidad')->pluck('calificacion');

            $maestro = $materia->asignacion_materias()
                ->where('grupo_id', $lastGroup->id)->first()
                ->maestro->persona;

            $maestroNom = $maestro->nom.' '.$maestro->apeP.' '.$maestro->apeM;

            $califList->push([
                'materia' => $materia->nom,
                'maestro' => $maestroNom,
                'prom' => $materiaCalifs->avg(),
                'califs' => $materiaCalifs->toArray()
            ]);
        }

        return json_encode($califList->toArray());
    }
}
