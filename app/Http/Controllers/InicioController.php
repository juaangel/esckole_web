<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Inf_contacto;
use App\Models\Usuario;

use App\Objects\TwilioSms;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    function aspirantes(){
        return view('principal.aspirantes');
    }

    function login(Request $data){
        $num = $data->get('num');
        $pass = $data->get('pass');

        //ALUMNO
        $user = Alumno::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass))
                return view('plataforma.alumno.home')->with('nom', $user->persona->nom);

        //EMPLEADO
        $user = Empleado::find($num);

        if($user != null)
            if(Hash::check($pass, $user->persona->usuario->pass)){
                if($user->tipoEmpleado->tipo == 'administrativo')
                    return view('plataforma.administrativo.home')->with('nom', $user->persona->nom);
                if($user->tipoEmpleado->tipo == 'maestro')
                    return view('plataforma.maestro.home')->with('nom', $user->persona->nom);
            }

        return back()->with('mensaje', 'Usuario o contraseña incorrectos');
    }

    # <Recuperación de cuenta>
    function recuperacion(Request $data){
        $tel = $data->get('tel');

        $contacto = Inf_contacto::where('tel', '+' . str_replace('-', '', $tel))->first();

        if($contacto == null)
            return json_encode(['tel' => null]);

        $accountSid = config('app.twilio')["TWILIO_ACCOUNT_SID"];
        $authToken = config('app.twilio')['TWILIO_AUTH_TOKEN'];

        TwilioSms::recuperacionSend($contacto, $accountSid, $authToken);

        $person = $contacto->persona;

        if($person->alumno != null){
            $text = 'Matrícula: ';
            $num = $person->alumno->matricula;
        }

        if($person->empleado != null){
            $text = 'Número de empleado: ';
            $num = $person->empleado->numEmp;
        }

        return json_encode(['num' => $num,
                            'tel' => $contacto->tel,
                            'text' => $text]);
    }

    function checkCode(Request $data){
        $person = Alumno::find($data->get('num'));

        if($person == null)
            $person = Empleado::find($data->get('num'));

        $usuario = $person->persona->usuario;

        if(Hash::check($data->get('code'), $usuario->codigo_identify))
            return json_encode(['user_id' => $usuario->id]);

        return json_encode(['user_id' => null]);
    }

    function changePassword(Request $data){
        $usuario = Usuario::find($data->get('user_id'));
        $usuario->pass = Hash::make($data->get('pass'));
        $usuario->save();

        return json_encode(['msj' => 'Tu contraseña ha sido cambiada con éxito. Vuelve a iniciar sesión.']);
    }
    # </Recuperación de cuenta>
}
