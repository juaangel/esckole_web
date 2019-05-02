<?php

namespace App\Http\Controllers\Plataforma;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Aspirante;
use App\Models\Calificaciones;
use App\Models\Inf_contacto;
use App\Models\Inf_salud;
use App\Models\Persona;
use App\Http\Controllers\Plataforma\Session

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Inf_contacto;
use App\Models\Usuario;

class AlumnoController extends Controller
{
    function Cali()
    {

        //Arreglo a mandar
        $califList = collect([]);

        //Datos de alumno
        $alumno = Session::get('user')->num->get('usuario')->persona->alumno;

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
  // return view ('plataforma.alumno.Calificaciones');
    }
}
