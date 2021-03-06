<?php

namespace App\Objects;

use App\Models\Alumno;

class datosAlumno
{
    public $matri = 0;
    public $nom = '';
    public $apeP = '';
    public $apeM = '';
    public $grupo = '';
    public $f_nac = '';
    public $curp = '';
    public $prom = 0;
    public $tipo_beca = '';
    public $nom_padre_tutor = '';
    public $tel_padre_tutor = '';
    public $tutor = '';

    public $tel = '';
    public $email = '';
    public $direccion = '';

    public $nss = '';
    public $seguro = '';
    public $tipoSangre = '';
    public $alergias = '';
    public $enfermedades = '';

    public function __construct($matri){
        $datosAlumno = Alumno::find($matri);
        $datosPersona = $datosAlumno->persona;
        $datosGrupo = $datosAlumno->grupos()
            ->orderBy('grado', 'DESC')
            ->get()->first();
        $datosTutor = $datosGrupo->tutor->persona;
        $datosContacto = $datosPersona->inf_contacto;
        $datosSalud = $datosPersona->inf_salud;


        $this->matri = $matri;
        $this->nom = $datosPersona->nom;
        $this->apeP = $datosPersona->apeP;
        $this->apeM = $datosPersona->apeM;
         $this->f_nac = $datosPersona->fecha_nac;
        $this->curp = $datosPersona->curp;
        $this->grupo = $datosGrupo->grado . 'º ' . $datosGrupo->seccion;
        $this->tutor = $datosTutor->nom . ' ' . $datosTutor->apeP . ' ' . $datosTutor->apeM;
        $this->prom = $datosAlumno->calificaciones->avg('calificacion');
        $this->tipo_beca = $datosAlumno->tipo_beca;
        $this->nom_padre_tutor = $datosAlumno->nom_padre_tutor;
        $this->tel_padre_tutor = $datosAlumno->tel_padre_tutor;
        $this->tel = $datosContacto->tel;
        $this->email = $datosContacto->correo;
        $this->direccion = $datosContacto->direccion;
        $this->nss = ($datosSalud->nss != null) ? $datosSalud->nss : 'No tiene';
        $this->seguro = ($datosSalud->tipo_seguro != null) ? $datosSalud->tipo_seguro : 'No tiene';
        $this->tipoSangre = $datosSalud->tipo_sangre;
        $this->alergias = ($datosSalud->alergias != null) ? $datosSalud->alergias : 'Ninguna';
        $this->enfermedades = ($datosSalud->enfermedades != null) ? $datosSalud->enfermedades : 'Ninguna';
    }

    public function toJson(){
        return json_encode([
            'matri' => $this->matri,
            'nom' => $this->nom,
            'apeP' => $this->apeP,
            'apeM' => $this->apeM,
            'f_nac' => $this->f_nac,
            'curp' => $this->curp,
            'grupo' => $this->grupo,
            'prom' => $this->prom,
            'beca' => $this->tipo_beca,
            'nom_padre_tutor' => $this->nom_padre_tutor,
            'tel_padre_tutor' => $this->tel_padre_tutor,
            'tutor' => $this->tutor,
            'tel' => $this->tel,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'nss' => $this->nss,
            'seguro' => $this->seguro,
            'tipoSangre' => $this->tipoSangre,
            'alergias' => $this->alergias,
            'enfermedades' => $this->enfermedades,
            'isTrue' => true
        ]);
    }
}
