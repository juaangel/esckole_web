<?php

namespace App\Models;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Inf_contacto;
use App\Models\Inf_salud;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = ['nom', 'apeP', 'apeM', 'fecha_nac', 'curp'];

    public function alumno(){
        return $this->hasOne(Alumno::class);
    }

    public function empleado(){
        return $this->hasOne(Empleado::class);
    }

    public function inf_contacto(){
        return $this->belongsTo(Inf_contacto::class, 'id');
    }

    public function inf_salud(){
        return $this->belongsTo(Inf_salud::class, 'id');
    }

    public function usuario(){
        return $this->hasOne(Usuario::class, 'id');
    }
}
