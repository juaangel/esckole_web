@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="#" class="list-group-item list-group-item-action bg-light">Inscripciones</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Notificaciones</a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Añadir personal</a>
@endsection
@section('title') Datos personales @endsection
@section('content')

<div class="container mt-4">
    <h3><i class="fas fa-user mr-3"></i>{{$datos->nom.' '.$datos->apeP.' '.$datos->apeM}}</h3>
    <h6 class="text-uppercase">{{Session::get('user')->tipo}}</h6>

    <hr class="bg-primary">

    <div class="row">
        <div class="col-md">
            <div class="w-100 blue-gradient white-text">
                <h5 class="p-2"><i class="fas fa-user p-2"></i>Datos personales</h5>
            </div>
            <table class="table table-borderless table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Nombre:</th>
                        <td>{{$datos->nom}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido paterno:</th>
                        <td>{{$datos->apeP}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido materno:</th>
                        <td>{{$datos->apeM}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha de nacimiento:</th>
                        <td>{{$datos->f_nac}}</td>
                    </tr>
                    <tr>
                        <th scope="row">CURP:</th>
                        <td>{{$datos->curp}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md">
            <div class="w-100 blue-gradient white-text">
                <h5 class="p-2"><i class="fas fa-map-marker-alt p-2"></i>Contacto</h5>
            </div>
            <table class="table table-borderless table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Correo electrónico:</th>
                        <td>{{$datos->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Dirección:</th>
                        <td>{{$datos->direccion}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Teléfono:</th>
                        <td>{{$datos->tel}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md">
            <div class="w-100 blue-gradient white-text">
                <h5 class="p-2"><i class="fas fa-briefcase-medical p-2"></i>Salud</h5>
            </div>
            <table class="table table-borderless table-sm">
                <tbody>
                   <tr>
                        <th scope="row">No. seguro:</th>
                        <td>{{$datos->nss}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Seguro:</th>
                        <td>{{$datos->seguro}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tipo de sangre:</th>
                        <td>{{$datos->tipoSangre}}</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="2">Alergías:</th>
                    </tr>
                    <tr>
                        <td colspan="2">{{$datos->alergias}}</td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3">Enfermedades:</th>
                    </tr>
                    <tr>
                        <td colspan="2">{{$datos->enfermedades}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="mt-3 text-primary">Cuenta de usuario</h3>
    <div class="container mb-4">
        <div class="row">
            <div class="col-xs-6">
                <table class="table table-borderless table-sm">
                <tbody>
                    <tr>
                        <th scope="row">Número de empleado:</th>
                        <td>{{$datos->numEmp}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <form action="" method="post">
            <div class="md-form form-sm" style="margin-bottom: -30px;">
                <label for="oldPass">Contraseña actual</label>
                <input required type="text" name="oldPass" class="form-control validate">
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="md-form form-sm">
                        <label for="oldPass">Nueva contraseña</label>
                        <input required type="text" name="oldPass" class="form-control validate">
                    </div>
                </div>
                <div class="col-md">
                    <div class="md-form form-sm">
                        <label for="oldPass">Confirmar nueva contraseña</label>
                        <input required type="text" name="oldPass" class="form-control validate">
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col">
                   <button type="submit" class="btn blue-gradient btn-block">Cambiar contraseña</button>
               </div>
            </div>
        </form>
    </div>
</div>

@endsection
