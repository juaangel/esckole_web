<?php

namespace App\Models;

use App\Models\Persona;

use Illuminate\Database\Eloquent\Model;

class Inf_contacto extends Model
{
    protected $table = 'inf_contacto';
    public $timestamps = false;

    public function persona(){
        return $this->hasOne(Persona::class, 'id');
    }
}
