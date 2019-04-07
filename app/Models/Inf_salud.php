<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inf_salud extends Model
{
    protected $table = 'inf_salud';
    public $timestamps = false;

    public function persona(){
        return $this->hasOne(Persona::class, 'id');
    }
}
