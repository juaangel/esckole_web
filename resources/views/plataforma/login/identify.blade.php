@extends('plantillas.recursos')
@section('extraCSS')
    <link rel="stylesheet" href="/css/styles/login/identify.css">
@endsection
@section('title') Identificación @endsection
@section('body')

   <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a id="home" class="fas fa-home" href="/"></a>
        <div class="navbar-brand" href="/">
            <img id="logo" src="/img/logo.png" height="60" alt="CBTa logo">
            <strong>Plataforma escolar</strong>
        </div>
        <div class="d-flex justify-content-end w-100">
            <ul class="navbar-nav text-center font-weight-bolder text-uppercase">
                <li class="nav-item">
                    <a class="nav-link" href="/plataforma/login">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card">
                <div class="card-header">
                    Recuperar cuenta
                </div>
                <div class="card-body">
                    <div id="part1">
                        <p class="card-text">Ingresa tu número de teléfono con lada.</p>
                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="tel">Teléfono</label>
                            <input required type="number" name="tel" class="form-control validate">
                        </div>
                        <button id="part1-btn" class="btn btn-success btn-block my-4">Continuar</button>

                        <p class="card-text">Después de presionar <b>Continuar</b>, recibirás un SMS con el código de recuperación.</p>
                    </div>
                    <div id="part2">
                        <p class="card-text">Escribe el código de recuperación que has recibido.</p>
                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="code">Código</label>
                            <input required type="text" name="code" class="form-control validate">
                            <button id="part2-btn" class="btn btn-success btn-block my-4">Ingresar</button>
                        </div>
                    </div>
                    <div id="part3">
                       <h5 class="card-title">Establecer nueva contraseña</h5>
                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="pass">Nueva contraseña</label>
                            <input required type="password" name="pass" class="form-control validate">
                        </div>
                        <div class="md-form">
                            <label data-error="wrong" data-success="right" for="pass2">Confirmar contraseña</label>
                            <input required type="password" name="pass2" class="form-control validate">
                        </div>
                        <button id="part3-btn" class="btn btn-success btn-block my-4">Ingresar</button>
                    </div>
                    <div class="collapse" id="codigo"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function(){
        var _token = '{{csrf_token()}}',

            collapsible =  $('#codigo'),
            part1 = $('#part1'),
            part2 = $('#part2'),
            part3 = $('#part3'),

            num, user_id;

        part2.hide();
        part3.hide();

        $('#part1-btn').click(function(){
            var tel = $("input[name='tel']").val();

            if(tel != ""){
                $.ajax({
                    url: '/sms',
                    data: {tel, _token},
                    type: 'POST',
                    dataType: 'json',
                    error: function(response){
                        console.log(response.responseText);
                    },
                    success: function(response){
                        if(response.tel == null){
                            collapsible.prepend(
                                "<div class='alert alert-danger' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation-circle'></i>Número no encontrado, consulta al personal administrativo del plantel.</div>"
                            );
                        }
                        else{
                            collapsible.prepend(
                                "<div class='alert alert-success' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-check-circle'></i>El mensaje ha sido enviado a <b>"+response.tel+"</b>. Esto puede tardar unos minutos.</div>"
                            );

                            setTimeout(function(){
                                num = response.num;

                                $('.card-body').prepend("<p class='card-text'>"+response.text+"<b>"+num+"</b></p>");

                                part1.remove();
                                part2.show();
                            }, 3000);
                        }
                    }
                });

                collapsible.collapse();
            }
        });

        $('#part2-btn').click(function(){
            var code = $("input[name='code']").val();

            if(code != ""){
                $.ajax({
                    url: '/checkCode',
                    data: {num, code, _token},
                    type: 'POST',
                    dataType: 'json',
                    error: function(response){
                        console.log(response.responseText);
                    },
                    success: function(response){
                        if(response.user_id == null){
                            collapsible.prepend(
                                "<div class='alert alert-danger' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-exclamation-circle'></i>Código incorrecto. Vuelve a intentarlo.</div>"
                            );
                        }
                        else{
                            user_id = response.user_id;

                            part2.remove();
                            part3.show();
                        }
                    }
                });
            }
        });

        $('#part3-btn').click(function(){
            var pass = $("input[name='pass']").val(),
                pass2 = $("input[name='pass2']").val();

            if(pass != "" && pass2 == pass){
                $.ajax({
                    url: '/changePassword',
                    data: {user_id, pass, _token},
                    type: 'POST',
                    dataType: 'json',
                    error: function(response){
                        console.log(response.responseText);
                    },
                    success: function(response){
                        collapsible.prepend(
                                "<div class='alert alert-success' role='alert'><button type='button' class='close-alert'>×</button><i class='fas fa-check-circle'></i>"+response.msj+"</div>"
                            );

                            setTimeout(function(){
                               window.location.replace("http://esckole.mipantano.com/plataforma/login");
                            }, 3000);
                    }
                });
            }
        });

        $(document).on('click', '.close-alert', function () {
            $(this).parent().remove();
        });
    });

</script>

@endsection
