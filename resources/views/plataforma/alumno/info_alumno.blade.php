@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="#" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Datos personales @endsection
@section('content')

<div class="container mt-4">
    <h3><i class="fas fa-user mr-3"></i>{{$datos->nom.' '.$datos->apeP.' '.$datos->apeM}}</h3>
    <h6 class="text-uppercase">{{Session::get('user')->tipo}}</h6>

    <hr class="bg-primary">

    <div class="row">
        <div class="col-md-6">
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
                      <tr>
                        <th scope="row">Nombre Del Padre:</th>
                        <td>{{$datos->nom_padre_tutor}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <div class="w-100 blue-gradient white-text">
                <h5 class="p-2"><i class="fas fa-user p-2"></i>Datos Academicos</h5>
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


        <div class="col-md-6">
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
        <div class="col-md-6">
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
                        <th scope="row">Matricula:</th>
                        <td>{{$datos->matri}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <form>
            <div class="md-form form-sm" style="margin-bottom: -30px;">
                <label for="oldPass">Contraseña actual</label>
                <input required type="password" name="oldPass" class="form-control validate">
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="md-form form-sm">
                        <label for="newPass">Nueva contraseña</label>
                        <input required type="password" name="newPass" class="form-control validate">
                    </div>
                </div>
                <div class="col-md">
                    <div class="md-form form-sm">
                        <label for="newPass2">Confirmar nueva contraseña</label>
                        <input required type="password" name="newPass2" class="form-control validate">
                    </div>
                </div>
            </div>
            <div class="row mb-3">
               <div class="col">
                   <button id="newPassBtn" type="button" class="btn blue-gradient btn-block">Cambiar contraseña</button>
               </div>
            </div>
            <div class="row">
               <div id="alertContainer" class="col">

               </div>
            </div>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        var alertContainer = $('#alertContainer'),
            _token = '{{csrf_token()}}';

        $('#newPassBtn').click(function(){
            var oldPass = $("input[name='oldPass']").val(),
                newPass = $("input[name='newPass']").val(),
                newPass2 = $("input[name='newPass2']").val();

            if(oldPass != "" && oldPass != null){
                if(newPass != "" && newPass != null){
                    if(newPass == newPass2){
                        $.ajax({
                            url: '/changePassword2',
                            data: {oldPass, newPass, _token},
                            type: 'POST',
                            dataType: 'json',
                            error: function(response){
                                console.log(response.responseText);
                            },
                            success: function(response){
                                if(response.msj == 'success'){
                                    alertContainer.prepend(
                                        "<div class='alert alert-success' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-check-circle mr-2'></i>Contraseña cambiada con éxito.</div>"
                                    );
                                }
                                else if(response.msj == 'incorrectPass'){
                                    alertContainer.prepend(
                                        "<div class='alert alert-danger' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation-circle mr-2'></i>Contraseña incorrecta.</div>"
                                    );
                                }
                                else{
                                    alertContainer.prepend(
                                        "<div class='alert alert-danger' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation-circle mr-2'></i>Algo salió mal.</div>"
                                    );
                                }
                            }
                        });
                    }
                    else{
                        alertContainer.prepend(
                            "<div class='alert alert-warning' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation mr-2'></i>Las contraseñas no coinciden.</div>"
                        );
                    }
                }
                else{
                    alertContainer.prepend(
                        "<div class='alert alert-warning' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation mr-2'></i>No has escrito tu nueva contraseña.</div>"
                    );
                }
            }
            else{
                alertContainer.prepend(
                    "<div class='alert alert-warning' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation mr-2'></i>No has escrito tu contraseña actual.</div>"
                );
            }
        });
    });
</script>


@endsection