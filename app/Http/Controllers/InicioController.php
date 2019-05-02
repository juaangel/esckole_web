<?php

namespace App\Http\Controllers;

use App\Models\Aspirante;

use Carbon\Carbon;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    function aspirantes(){
        return view('principal.aspirantes');
    }

    function fichaOnline(Request $R){
        $date = Carbon::now();

        $seguro = ($R->get('seguro') == "Otro") ?
            $R->get('seguro') :
            $R->get('seguroOtro');

        $aspirante = Aspirante::create([
            'folio' => $date->format('dmyhi').mt_rand(1000, 9999),
            'nom' => $R->get('nom'),
            'apeP' => $R->get('apeP'),
            'apeM' => $R->get('apeM'),
            'fNac' => $R->get('f_nac'),
            'curp' => $R->get('curp'),
            'nom_padre_tutor' => $R->get('padreTutor'),
            'tel_padre_tutor' => $R->get('telPadreTutor'),
            'dir' => $R->get('dir'),
            'tel' => $R->get('tel'),
            'email' => $R->get('email'),
            'tipo_beca' => $R->get('beca'),
            'numSeguro' => $R->get('numSeguro'),
            'seguro' => $seguro,
            'tipo_sangre' => $R->get('sangre'),
            'alergias' => $R->get('alergias'),
            'enfermedades' => $R->get('enfermedades')
        ]);

        $datos = [
            'folio' => $aspirante->folio,
            'nom' => $aspirante->nom,
            'apeP' => $aspirante->apeP,
            'apeM' => $aspirante->apeM,
            'tel' => $aspirante->tel,
            'date' => $aspirante->created_at
        ];

        $view = \View::make('pdf.ficha', compact('datos'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('ficha.pdf');
    }
}
