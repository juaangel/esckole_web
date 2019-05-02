<?php

namespace App\Models;

use App\Models\Asignacion_materias;
use App\Models\Grupo;
use App\Models\Persona;
use App\Models\TipoEmpleado;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $primaryKey = 'numEmp';
    public $timestamps = false;

    public function asignacion_materias(){
        return $this->hasMany(Asignacion_materias::class, 'maestro_id', 'numEmp');
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class, 'asignacion_materias', 'maestro_id');
    }

    public function gruposTutor(){
        return $this->hasMany(Grupo::class, 'numTutor', 'numEmp');
    }

    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    public function tipoEmpleado(){
        return $this->belongsTo(TipoEmpleado::class, 'tipo');
    }
}
