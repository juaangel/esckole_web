<?php

namespace App\Http\Controllers\Plataforma;

use App\Models\Alumno;
use App\Models\Empleado;
use App\Models\Inf_contacto;
use App\Models\Usuario;

use App\Objects\datosAdmin;
use App\Objects\datosAlumno;
use App\Objects\TwilioSms;
use App\Objects\UserSession;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class PlataformaController extends Controller
{
    function login(Request $data){
        $num = $data->get('num');
        $pass = $data->get('pass');

        //Variable auxiliar para verificación
        $esAlumno = Alumno::find($num);

        $user = ($esAlumno != null) ?
            $esAlumno->persona->usuario :
            Empleado::find($num);

        if($user != null){
            $user = $user->persona->usuario;
            if(Hash::check($pass, $user->pass))
            {
                Session::put('user', UserSession::getInstance($user));

                return redirect('/plataforma');
            }
        }

        return back()->with('mensaje', 'Usuario o contraseña incorrectos');
    }

    function cerrarSesion(){
        Session::pull('user');
        return redirect('/plataforma');
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

    function platformAccess(){
        if(Session::has('user')){
            $tipoUsuario = Session::get('user')->tipo;

            if($tipoUsuario == 'alumno')
                return view('plataforma.alumno.home');
            if($tipoUsuario == 'administrativo')
                return view('plataforma.administrativo.home');
            if($tipoUsuario == 'maestro')
                return view('plataforma.maestro.home');
        }

        return redirect('/plataforma/login');
    }

    function personInfo(){
        $personType = Session::get('user')->tipo;

        if($personType == 'administrativo'){
            return view('plataforma.administrativo.info_persona')
                ->with('datos', new datosAdmin(Session::get('user')->person_id));
        }
        if($personType == 'alumno'){
            return view log(tipo);
            /*('plataforma.alumno.info_alumno')
             ->with('datos', new datosAlumno(Session::get('user')->person_id));*/
        }
        if($personType == 'maestro'){
            return view('inConstruct');
        }

        return view('plataforma.administrativo.info_persona');
    }

    function changePassword2(Request $data){
        $usuario = Usuario::find(Session::get('user')->person_id);

        if($usuario != null){
            if(Hash::check($data->get('oldPass'), $usuario->pass)){
                $usuario->pass = Hash::make($data->get('newPass'));
                $usuario->save();

                return json_encode(['msj' => 'success']);
            }
            return json_encode(['msj' => 'incorrectPass']);
        }

        if($usuario != null && Hash::check($data->get('oldPass'), $usuario->pass)){
            $usuario->pass = Hash::make($data->get('newPass'));
            $usuario->save();

            return json_encode(['msj' => true]);
        }

        return json_encode(['msj' => false]);
    }
}
