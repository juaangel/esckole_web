@extends('principal.plantilla')
@section('extraCSS')
    <link rel="stylesheet" href="css/styles/principal/aspirantes.css">
@endsection
@section('title') Aspirantes @endsection

@section('content')

<div class="container">
  {{--Proceso de inscripción--}}
   <div class="row white-text" style="padding-top: 30px;">
        <div class="col-md escko-bg-green-1 white-text">
            <h5 class="text-center font-weight-bolder" style="padding-top: 20px;">
                <i class="fab fa-wpforms"></i>
                Ficha de inscripción
            </h5>
            <p class="text-center" style="font-size: 16px;">5 de febrero al 31 de mayo</p>
            <div class="text-center" style="padding-bottom: 20px;">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-ficha">REQUISITOS</button>
            </div>
        </div>
        <div class="col-md escko-bg-green-2 white-text">
            <h5 class="text-center font-weight-bolder" style="padding-top: 20px;">
                <i class="far fa-file-alt"></i>
                Exámen de diagnóstico
            </h5>
            <p class="text-center" style="font-size: 16px;">12 y 13 de junio 9:00 hrs</p>
            <p>
                El salón será indicado en la ficha de inscripción, favor de llegar con 30 minutos de anticipación.
            </p>
        </div>
        <div class="col-md escko-bg-yellow white-text">
            <h5 class="text-center font-weight-bolder" style="padding-top: 20px;">
                <i class="far fa-check-circle"></i>
                Inscripción
            </h5>
            <p class="text-center" style="font-size: 16px;">5 al 10 de agosto</p>
            <div class="text-center" style="padding-bottom: 20px;">
                <button class="btn btn-success" data-toggle="modal" data-target="#modal-inscripcion">REQUISITOS</button>
            </div>
        </div>

    </div>

    <div class="text-center" style="margin-top: 20px;">
        <button class="btn btn-dark-green btn-lg"  data-toggle="modal" data-target="#modal-solicitud">
            <i class="fas fa-globe mr-1"></i>Solicitud en línea
        </button>
        <p>Si envías la solicitud en línea, deberás asistir al plantel con tu ficha para realizar el examen de diagnostico.</p>
    </div>
</div>

<!--MODAL Ficha-->
<div id="modal-ficha" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header escko-bg-green-1 text-white">
                <h5>Requisitos para la ficha de inscripción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Puedes obtener tu ficha asistiendo al plantel y otorgando los siguientes datos, o bien, solicitar tu ficha en línea.</p>
                <ul style="font-size: 14px;">
                    <li>Nombre</li>
                    <li>Fecha de nacimiento</li>
                    <li>CURP</li>
                    <li>Dirección</li>
                    <li>Teléfono</li>
                    <li>Correo electrónico</li>
                    <li>Nombre del padre/tutor</li>
                    <li>Teléfono del padre/tutor</li>
                    <li>Tipo de beca</li>
                    <li>Tipo de seguro</li>
                    <li>Alergías</li>
                    <li>Enfermedades</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--MODAL Inscripcion-->
<div id="modal-inscripcion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header escko-bg-yellow text-white">
                <h5>Requisitos para realizar la inscripción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <ul style="font-size: 14px;">
                    <li>Acta de nacimiento</li>
                    <li>Certificado de secundaria</li>
                    <li>Comprobante de domicilio</li>
                    <li>CURP original y copia.</li>
                    <li>Número de seguridad social</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--MODAL Solicitud en linea-->
<div id="modal-solicitud" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header font-weight-bolder">
                <h5 class="text-center">
                    <i class="fas fa-globe mr-1"></i>
                    Solicitud en línea
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="modal-body">
                    <p>Recibirás tu ficha en formato PDF una vez que envíes tus datos, imprime el archivo y asiste al examen de diagnóstico.</p>
                        <div class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="nom">Nombre</label>
                            <input required type="text" name="nom" class="form-control validate">
                        </div>
                        <div class="mb-5"  style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="f_nac">Fecha de nacimiento</label>
                            <input required type="date" name="f_nac" class="form-control validate">
                        </div>
                        <div class="row" style="margin-top: -40px;">
                            <div class="col">
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="apeP">Apellido paterno</label>
                                    <input required type="text" name="apeP" class="form-control validate">
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form mb-5">
                                    <label data-error="wrong" data-success="right" for="apeM">Apellido materno</label>
                                    <input required type="text" name="apeM" class="form-control validate">
                                </div>
                            </div>
                        </div>
                        <div class="md-form mb-5" style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="curp">CURP</label>
                            <input required type="text" maxlength="18" name="curp" class="form-control validate text-uppercase">
                        </div>
                        <div class="md-form mb-5" style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="dir">Dirección</label>
                            <input required type="text" name="dir" class="form-control validate">
                        </div>
                        <div class="md-form mb-5" style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="tel">Teléfono</label>
                            <input required type="number" name="tel" class="form-control validate">
                        </div>
                        <div class="md-form mb-5" style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="email">Correo electrónico</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="md-form mb-5" style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="nomTutor">Nombre del tutor</label>
                            <input required type="text" name="nomTutor" class="form-control validate">
                        </div>
                        <div class="md-form mb-5" style="margin-top: -20px;">
                            <label data-error="wrong" data-success="right" for="telTutor">Teléfono del tutor</label>
                            <input required type="number" name="telTutor" class="form-control validate">
                        </div>
                        <div class="form-group">
                           <label data-error="wrong" data-success="right" for="beca" style="font-size: 13px;">Tipo de beca</label>
                            <select name="beca" class="browser-default custom-select">
                              <option value="Federal">Beca federal</option>
                              <option value="Estatal">Beca estatal</option>
                              <option selected value="Ninguna">Ninguna</option>
                            </select>
                        </div>
                        <div class="form-group">
                           <label data-error="wrong" data-success="right" for="seguro" style="font-size: 13px;">Tipo de seguro</label>
                            <select id="seguro" name="seguro" class="browser-default custom-select">
                              <option value="Axa Seguros">Axa Seguros</option>
                              <option value="IMSS">IMSS</option>
                              <option value="ISSSTE">ISSSTE</option>
                              <option value="Metlife">Metlife</option>
                              <option value="Plan Seguro">Plan Seguro</option>
                              <option value="Seguro Popular">Seguro Popular</option>
                              <option selected value="Ninguno">Ninguno</option>
                              <option value="Otro">Otro</option>
                            </select>
                        </div>
                        <div id="inputSeguro" class="md-form mb-5">
                            <label data-error="wrong" data-success="right" for="seguroOtro">Específica el nombre del seguro:</label>
                            <input required type="text" name="seguroOtro" class="form-control validate">
                        </div>
                        <div class="md-form mb-5">
                             <label for="alergias">Alergías</label>
                              <textarea name="alergias" class="md-textarea form-control" rows="3"></textarea>
                        </div>
                        <div class="md-form mb-5">
                          <label for="enfermedades">Enfermedades</label>
                           <textarea name="enfermedades" class="md-textarea form-control" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Conseguir ficha</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
          var inputSeguro = $('#inputSeguro');
            inputSeguro.hide();

            $('#seguro').on("change", function(){
                var valor = $('#seguro').val();

                if(valor == "Otro")
                    inputSeguro.show(500);
                else
                    inputSeguro.hide(500);
            });
        });
    </script>
@endsection
