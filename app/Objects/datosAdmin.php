<?php

namespace App\Objects;

use App\Models\Persona;

class datosAdmin
{
    public $numEmp = 0;
    public $nom = '';
    public $apeP = '';
    public $apeM = '';
    public $f_nac = '';
    public $curp = '';

    public $email = '';
    public $direccion = '';
    public $tel = '';

    public $nss = '';
    public $seguro = '';
    public $tipoSangre = '';
    public $alergias = '';
    public $enfermedades = '';

    public function __construct($person_id){
        $person = Persona::find($person_id);
        $empleado = $person->empleado;
        $inf_contacto = $person->inf_contacto;
        $inf_salud= $person->inf_salud;

        $this->numEmp = $empleado->numEmp;
        $this->nom = $person->nom;
        $this->apeP = $person->apeP;
        $this->apeM = $person->apeM;
        $this->f_nac = $person->fecha_nac;
        $this->curp = $person->curp;

        $this->email = $inf_contacto->correo;
        $this->direccion = $inf_contacto->direccion;
        $this->tel = $inf_contacto->tel;

        $this->nss = $inf_salud->nss;
        $this->seguro = $inf_salud->tipo_seguro;
        $this->tipoSangre = $inf_salud->tipo_sangre;
        $this->alergias = ($inf_salud->alergias != null) ? $inf_salud->alergias : 'Ninguna';
        $this->enfermedades = ($inf_salud->enfermedades != null) ? $inf_salud->enfermedades : 'Ninguna';
    }

    public function toJson(){
        return json_encode([
            'matri' => $this->matri,
            'nom' => $this->nom,
            'apeP' => $this->apeP,
            'apeM' => $this->apeM,
            'f_nac' => $this->f_nac,
            'curp' => $this->curp,
            'email' => $this->email,
            'direccion' => $this->direccion,
            'tel' => $this->tel,
            'nss' => $this->nss,
            'seguro' => $this->seguro,
            'tipoSangre' => $this->tipoSangre,
            'alergias' => $this->alergias,
            'enfermedades' => $this->enfermedades,
            'isTrue' => true
        ]);
    }
}
