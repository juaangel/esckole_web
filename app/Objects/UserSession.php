<?php

namespace App\Objects;

use App\Models\Alumno;

class UserSession
{
    public $num = 0;
    public $person_id = 0;
    public $tipo = '';
    public $nom = '';
    public $apeP = '';
    public $apeM = '';

    private function __construct($num, $person_id, $tipo, $nom, $apeP, $apeM){
        $this->num = $num;
        $this->person_id = $person_id;
        $this->tipo = $tipo;
        $this->nom = $nom;
        $this->apeP = $apeP;
        $this->apeM = $apeM;
    }

    public static function getInstance($user){
        $person = $user->persona;

        $personType = $person->alumno;

        if($personType != null){
            $num = $personType->matricula;
            $tipo = 'alumno';
        }
        else{
            $personType = $person->empleado;

            if($personType != null){
                $num = $personType->numEmp;
                $tipo = $personType->tipoEmpleado->tipo;
            }
        }

        $person_id = $person->id;
        $nom = $person->nom;
        $apeP = $person->apeP;
        $apeM = $person->apeM;

        return new UserSession($num, $person_id, $tipo, $nom, $apeP, $apeM);
    }
}
