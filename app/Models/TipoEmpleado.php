<?php

namespace App\Models;

use App\Models\Empleado;

use Illuminate\Database\Eloquent\Model;

class TipoEmpleado extends Model
{
    protected $table = "tipo_empleado";
    public $timestamps = false;

    public function empleados(){
        return $this->hasMany(Empleado::class, 'tipo');
    }
}
