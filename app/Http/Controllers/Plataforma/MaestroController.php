<?php

namespace App\Http\Controllers\Plataforma;

use App\Models\Calificaciones;
use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Materia;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class MaestroController extends Controller
{
    function califsView(){
        $numEmp = Session::get('user')->num;
        $grupos = Empleado::find($numEmp)->grupos;

        $materias = DB::table('grupos')
            ->where('empleados.numEmp', '=', $numEmp)
            ->join('grupo_materia', 'grupos.id', '=', 'grupo_materia.grupo_id')
            ->join('materias', 'grupo_materia.materia_id', '=', 'materias.id')
            ->join('asignacion_materias', 'materias.id', '=', 'asignacion_materias.materia_id')
            ->join('empleados', 'asignacion_materias.maestro_id', '=', 'empleados.numEmp')
            ->select('grupos.id', DB::raw("CONCAT(grupos.grado, 'º ', grupos.seccion) AS 'Grupo',
                                materias.id AS 'materia_ID', materias.nom AS 'Materia', empleados.numEmp"))
            ->get();

        return view('plataforma.maestro.calificaciones', compact('materias'));
    }

    function getMaterias(Request $R){
        $grupo_id = $R->get('grupo_id');
        $materias = json_decode($R->get('materias'));
        $materias = collect($materias);

        return json_encode($materias->where('id', $grupo_id)->toArray());
    }

    function getTable(Request $R){

        $datos = DB::table('alumnos')
            ->groupBy('alumnos.matricula')
            ->where(['alumnos.grupo_actual' => $R->get('grupo')],['calificaciones.materia_id' => $R->get('materia')])
            ->join('personas', 'alumnos.persona_id', '=', 'personas.id')
            ->join('calificaciones', 'alumnos.matricula', '=', 'calificaciones.matricula_alumno')
            ->join('alumno_grupo', 'alumnos.matricula', '=', 'alumno_grupo.alumno_matricula')
            ->select('alumnos.matricula', DB::raw("CONCAT(personas.nom,' ',personas.apeP,' ',personas.apeM) AS alumno,
            AVG(calificaciones.calificacion) AS promedio"))->get();

        $grupo_id = $R->get('grupo');
        $materia_id = $R->get('materia');

        return redirect('/plataforma/maestro/calificaciones')->with(compact('datos', 'grupo_id', 'materia_id'));
    }

    function califsView2(Request $R){
        $matricula = $R->get('matricula');
        $materia_id = $R->get('materia_id');

        $califs = Calificaciones::where(['matricula_alumno' => $matricula, 'materia_id' => $materia_id])->orderBy('unidad')->get();

        return view('plataforma.maestro.unidades', compact('califs'));
    }

    function upCalif(Request $R){
        $calif = Calificaciones::find($R->get('id'));
        $calif->calificacion = $R->get('calif');
        $calif->save();

        return redirect('/plataforma/maestro/calificaciones');
    }
}
