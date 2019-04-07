<?php

namespace App\Models;

use App\Models\Asignacion_materias;
use App\Models\Carrera;
use App\Models\Empleado;
use App\Models\Materia;
use App\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    public $timestamps = false;

    public function alumnos(){
        return $this->belongsToMany(Alumno::class);
    }

    public function asignacion_materias(){
        return $this->hasMany(Asignacion_materias::class);
    }

    public function carrera(){
        return $this->belongsTo(Carrera::class);
    }

    public function materias(){
        return $this->belongsToMany(Materia::class);
    }

    public function tutor(){
        return $this->belongsTo(Empleado::class, 'numTutor', 'numEmp');
    }
}
