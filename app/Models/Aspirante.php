<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirante extends Model
{
    protected $primaryKey = 'folio';

    protected $fillable = [
        'folio',
        'nom',
        'apeP',
        'apeM',
        'fNac',
        'curp',
        'nom_padre_tutor',
        'tel_padre_tutor',
        'dir',
        'tel',
        'email',
        'tipo_beca',
        'numSeguro',
        'seguro',
        'tipo_sangre',
        'alergias',
        'enfermedades'
    ];

    public $incrementing = false;
}
