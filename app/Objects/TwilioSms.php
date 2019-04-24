<?php

namespace App\Objects;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Inf_contacto;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use Twilio\Rest\Client;
use Twilio\Jwt\ClientToken;

class TwilioSms
{
    public static function recuperacionSend($inf_contacto, $accountSid, $authToken){
        $client = new Client($accountSid, $authToken);

        $person = $inf_contacto->persona;

        $nom = $person->nom.' '.$person->apeP.' '.$person->apeM;

        if($person->alumno != null)
            $numText = 'Matrícula: '.$person->alumno->matricula;
        if($person->empleado != null)
            $numText = 'Número de empleado: '.$person->empleado->numEmp;

        $code = Str::random(8);

        $user = $person->usuario;
        $user->codigo_identify = Hash::make($code);
        $user->codigo_status = 1;
        $user->save();

        $msj = "CBTa309 \n" .
                $nom . "\n" .
                $numText . "\n \n" .
                "Ingresa " . $code . " para acceder.";

        try{
            $client->messages->create(
                '+528713369489',
                array(
                    'from' => '+13343779264',
                    'body' => $msj
                )
            );
        }
        catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
