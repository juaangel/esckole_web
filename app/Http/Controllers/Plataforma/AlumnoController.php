<?php

namespace App\Http\Controllers\Plataforma;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Inf_contacto;
use App\Models\Usuario;
use App\Models\Materia;
use App\Models\Materia_unidad;
use App\Objects\datosAdmin;
use App\Objects\datosAlumno;
use App\Objects\UserSession;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class AlumnoController extends Controller
{
    function Cali()
    {

        //Arreglo a mandar
        $califList = collect([]);

        //Datos de alumno
        $r = Session::get('user')->num;

        $alumno = Alumno::find($r);

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

  	    return view ('plataforma.alumno.Calificaciones',compact('califList'));
    }
}
