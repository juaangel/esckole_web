<?php

namespace App\Models;

use App\Models\Empleado;
use App\Models\Grupo;
use App\Models\Materia;

use Illuminate\Database\Eloquent\Model;

class Asignacion_materias extends Model
{
    protected $table = 'asignacion_materias';
    public $timestamps = false;

    public function grupo(){
        return $this->belongsTo(Grupo::class);
    }

    public function maestro(){
        return $this->belongsTo(Empleado::class, 'maestro_id', 'numEmp');
    }

    public function materia(){
        return $this->belongsTo(Materia::class);
    }
}
