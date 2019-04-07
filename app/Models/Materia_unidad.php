<?php

namespace App\Models;

use App\Models\Calificaciones;
use App\Models\Materia;

use Illuminate\Database\Eloquent\Model;

class Materia_unidad extends Model
{
    protected $table = 'materia_unidad';
    public $timestamps = false;

    public function calificacion(){
        return $this->hasOne(Calificaciones::class, 'materia_unidad');
    }

    public function materia(){
        return $this->belongsTo(Materia::class);
    }
}
