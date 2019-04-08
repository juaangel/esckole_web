@extends('principal.plantilla')
@section('extraCSS')
    <link rel="stylesheet" href="css/styles/principal/contacto.css">
@endsection
@section('title') Contacto @endsection
@section('content')

    <!-- Jumbotron -->
    <div class="container-fluid text-center" id="jumbo">
        <h3 class="card-title font-weight-bolder escko-green-2">Contáctanos</h3>
        <div class="d-flex justify-content-center">
            <a href="mailto: cbta309@fakemail.com" class="btn peach-gradient text-white"  target="_blank"><i class="fas fa-envelope left"></i>Enviar correo</a>
            <a href="tel:0000000000" class="btn peach-gradient text-white"><i class="fas fa-phone left"></i>Marcar</a>
        </div>
    </div>
    <!-- Jumbotron -->

    <div id="form-container" class="container">
        <p class="text-center w-responsive mx-auto">También puedes llenar el siguiente formulario. Nos pondremos en contacto contigo.</p>

        <div class="row">
            <div class="col-md-9 mb-md-0 mb-5">
                <form action="mail.php" method="POST">

                    <!--Nombre-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <input type="text" name="nom" class="form-control">
                                <label for="nom">Nombre</label>
                            </div>
                        </div>
                    </div>

                    <!--Correo y tel-->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="email" name="email" class="form-control">
                                <label for="email">Correo</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="number" name="tel" class="form-control">
                                <label for="tel">Teléfono</label>
                            </div>
                        </div>

                    </div>

                    <!--Mensaje-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <textarea type="text" name="msj" rows="2" class="form-control md-textarea"></textarea>
                                <label for="msj">Mensaje</label>
                            </div>
                        </div>
                    </div>

                    <!--Boton-->
                    <div class="text-center text-md-left">
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </div>
                </form>
                <div class="status"></div>
            </div>

            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <p>C. Porfirio Diaz 23-120, Hidalgo, Coah.</p>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <p>+ 00 000 000 00</p>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <p>cbta309@fakemail.com</p>
                    </li>
                </ul>
            </div>

        </div>
    </div>

@endsection
