<?php

namespace App\Http\Controllers\Plataforma;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\TipoEmpleado;

use App\Models\Inf_contacto;
use App\Models\Usuario;
use App\Models\Calificaciones;
use App\Models\Aspirante;
use App\Objects\datosAdmin;
use App\Objects\datosAlumno;
use App\Objects\TwilioSms;
use App\Objects\UserSession;
use App\Models\Persona;
use App\Models\Inf_salud;
use App\Models\Grupo;
use Illuminate\Http\Request;
use  Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Plataforma\Aspirantes;


class AdministrativoController extends Controller
{
 
 function Rpersonal(){
        $personType = Session::get('user')->tipo;

         return view('plataforma.administrativo.añadir_personal')->with('datos', new datosAdmin(Session::get('user')->person_id));
    }


 function inscripcionesView(){
        $aspirantes = Aspirante::all()->where('status', 'pendiente');
        return view('plataforma.administrativo.añadir_alumno', compact('aspirantes'));
    }


    function altaAlumno(Request $r, $id){

    
        $aspirantes = Aspirante::find($id);


        $persona = new Persona();
        $persona->nom = $aspirantes->nom;
        $persona->apeP = $aspirantes->apeP;
        $persona->apeM = $aspirantes->apeM;
        $persona->fecha_nac = $aspirantes->fNac;
        $persona->curp = $aspirantes->curp;
        $persona->save();
        $infContacto = new Inf_contacto();
        $infContacto->id = $persona->id;
        $infContacto->tel = $aspirantes->dir;
        $infContacto->correo = $aspirantes->tel;
        $infContacto->direccion = $aspirantes->email;
        $infContacto->save();

        $infSalud = new Inf_salud();
        $infSalud->id = $persona->id;
        $infSalud->nss = $aspirantes->numSeguro;
        $infSalud->tipo_seguro = $aspirantes->seguro;
        $infSalud->tipo_sangre = $aspirantes->tipo_sangre;
        $infSalud->alergias = $aspirantes->alergias;
        $infSalud->enfermedades = $aspirantes->enfermedades;
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
        $alumno->nom_padre_tutor = $aspirantes->nom_padre_tutor;
        $alumno->tel_padre_tutor = $aspirantes->tel_padre_tutor;
        $alumno->tipo_beca = $aspirantes->tipo_beca;
        $alumno->grupo_actual = $grupo->id;
        $alumno->save();

        $materias = $grupo->materias;

        foreach($materias as $mat){
            $unidades = $mat->unidades;
            for($i = 1; $i <= $unidades; $i++){
                $calificacion = new Calificaciones();
                $calificacion->matricula_alumno =$matri;
                $calificacion->materia_id = $mat->id;
                $calificacion->unidad = $i;
                
                $calificacion->save();
            }
        }

        $aspirantes = Aspirante::all()->where('status', 'pendiente');
        return view('plataforma.administrativo.alta',compact('aspirantes'));


     }
        function regPer(Request $r)
    {

        $per = new Persona();
        
        $per->nom = $r->nom;
        $per->apeP = $r->paterno;
        $per->apeM = $r->materno;
        $per->fecha_nac = $r->f_naci;
        $per->curp = $r->curp;
        $per->save();


        $tp=new TipoEmpleado();
        $tp->tipo=$r->tipo;
                $tp->save();


          $te=new Empleado();
        $te->persona_id = $per->id;
        $te->tipo=$tp->tipo;
                $te->save();

         return "Personal Registrado"; 


    }

    function verper(){
        $per = Persona::all()->where('status', 'pendiente');

        return view('plataforma.administrativo.añadir_personal',compact('per'));
    }
   }