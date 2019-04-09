<?php

namespace App\Objects;

use App\Models\Alumno;

class AlumnoDatos
{
    private $matri = 0;
    private $nom = '';
    private $apeP = '';
    private $apeM = '';
    private $grupo = '';
    private $prom = 0;
    private $tipo_beca = '';

    private $nom_padre_tutor = '';
    private $tel_padre_tutor = '';
    private $tutor = '';

    private $tel = '';
    private $email = '';
    private $direccion = '';

    private $nss = '';
    private $seguro = '';
    private $tipoSangre = '';
    private $alergias = '';
    private $enfermedades = '';

    public function __construct($matri){
        $datosAlumno = Alumno::find($matri);
        $datosPersona = $datosAlumno->persona;
        $datosGrupo = $datosAlumno->grupos()
            ->orderBy('grado', 'DESC')
            ->get()->first();
        $datosContacto = $datosPersona->inf_contacto;
        $datosSalud = $datosPersona->inf_salud;

        $this->matri = $matri;
        $this->nom = $datosPersona->nom;
        $this->apeP = $datosPersona->apeP;
        $this->apeM = $datosPersona->apeM;
        $this->grupo = $datosGrupo->grado . 'º ' . $datosGrupo->seccion;
        $this->prom = $datosAlumno->calificaciones->avg('calificacion');
        $this->tipo_beca = $datosAlumno->tipo_beca;
        $this->nom_padre_tutor = $datosAlumno->nom_padre_tutor;
        $this->tel_padre_tutor = $datosAlumno->tel_padre_tutor;
        $this->tel = $datosContacto->tel;
        $this->email = $datosContacto->correo;
        $this->direccion = $datosContacto->direccion;
        $this->nss = $datosSalud->nss;
        $this->seguro = $datosSalud->tipo_seguro;
        $this->tipoSangre = $datosSalud->tipo_sangre;
        $this->alergias = $datosSalud->alergias;
        $this->enfermedades = $datosSalud->enfermedades;
    }

    public function toJson(){
        return json_encode([
            'matri' => $this->matri,
            'nom' => $this->nom,
            'apeP' => $this->apeP,
            'apeM' => $this->apeM,
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
            'enfermedades' => $this->enfermedades
        ]);
    }
}
