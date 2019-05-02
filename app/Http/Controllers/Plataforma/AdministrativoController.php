<?php

namespace App\Http\Controllers\Plataforma;

use App\Models\Alumno;
use App\Models\Aspirante;
use App\Models\Calificaciones;
use App\Models\Inf_contacto;
use App\Models\Inf_salud;
use App\Models\Persona;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministrativoController extends Controller
{
    function inscripcionesView(){
        $aspirantes = Aspirante::all()->where('status', 'pendiente');

        return view('plataforma.administrativo.inscripciones', compact('aspirantes'));
    }

    /*function altaAlumno(Request $R){
        $aspirante = Aspirantes::find($R->get('folio'));

        $persona = new Persona();
        $persona->nom = $aspirante->nom;
        $persona->apeP = $aspirante->apeP;
        $persona->apeM = $aspirante->apeM;
        $persona->fecha_nac = $aspirante->fNac;
        $persona->curp = $aspirante->curp;
        $persona->save();

        $infContacto = new Inf_contacto();
        $infContacto->id = $persona->id;
        $infContacto->tel = $aspirante->dir;
        $infContacto->correo = $aspirante->tel;
        $infContacto->direccion = $aspirante->email;
        $infContacto->save();

        $infSalud = new Inf_salud();
        $infSalud->id = $persona->id;
        $infSalud->nss = $aspirante->numSeguro;
        $infSalud->tipo_seguro = $aspirante->seguro;
        $infSalud->tipo_sangre = $aspirante->tipo_sangre;
        $infSalud->alergias = $aspirante->alergias;
        $infSalud->enfermedades = $aspirante->enfermedades;
        $infSalud->save();

        $matriculas = Alumno::all()->pluck('matricula');
        $matriNums = collect([]);

        foreach($matriculas as $matri){
            $matriNums->push(substr($matri, 4));
        }

        //Partes de matricula
        $year = Carbon::now()->format('y');
        $num = sprintf('%04d', $matriNums->max() + 1);
        //!Pastes de matricula

        $matri = $year.'01'.$num;

        $grupo = Grupo::where('grado', 1)->get()->random();

        $alumno = new Alumno();
        $alumno->matricula = $matri;
        $alumno->persona_id = $persona->id;
        $alumno->nom_padre_tutor = $aspirante->nom_padre_tutor;
        $alumno->tel_padre_tutor = $aspirante->tel_padre_tutor;
        $alumno->tipo_beca = $aspirante->tipo_beca;
        $alumno->exam_diag = $R->get('examen');

        $alumno->grupos()->save($grupo);

        $materias = $grupo->materias;

        foreach($materias as $mat){
            $unidades = $mat->unidades;
            for($i = 1; $i <= $unidades; $i++){
                $calificacion = new Calificaciones();
                $calificacion->matricula_alumno = $alumno->matricula;
                $calificacion->materia_id = $mat->id;
                $calificacion->unidad = $i;
                $calificacion->save();
            }
        }
    }*/
}
