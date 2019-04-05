<?php

namespace App\Models;

use App\Models\Asignacion_materias;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    public $timestamps = false;

    public function asignacion_materias(){
        return $this->hasMany(Asignacion_materias::class);
    }
}
