<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Nuestro CSS -->
    <link href="css/styles/styles_principal.css" rel="stylesheet">
    @yield('extraCSS')
    
    <link rel="icon" type="image/png" href="favicon.ico">
    <title>CBTa 309 - @yield('title')</title>

    @yield('jquery')
</head>

<body>
    <nav class="navbar navbar-expand-md flex-column fixed-top navbar-light bg-light">
        <a class="navbar-brand align-self-center m-0 pb-3 position-md-absolute pb-md-0" href="/">
            <img id="logo" src="img/logo.png" height="60" alt="CBTa logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-center w-100" id="navbarNav">
            <ul class="navbar-nav text-center font-weight-bolder text-uppercase">
                <li class="nav-item">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aspirantes">Aspirantes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cursos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div style="margin-top: 70px">
        @yield('content')
        
        <footer class="page-footer">
            <div class="row align-items-center">
                <p class="col text-left py-1" style="margin-left: 15px;">
                    ©2019 Centro de Bachillerato Tecnológico Agropecuario #309</p>
                <ul id="contacto" class="col text-right py-1">
                  <li>
                      <a href="mailto: cbta309@fakemail.com" style=" margin-right: 15px; margin-top: 1px;" target="_blank">
                        <i class="fas fa-envelope fa-lg white-text ml-3" aria-hidden="true"></i>
                        cbta309@fakemail.com</a>
                  </li>
                  <li>
                      <a href="tel:0000000000" style="margin-right: 15px; margin-top: 1px;" target="_blank">
                        <i class="fas fa-phone fa-lg white-text ml-3" aria-hidden="true"></i>
                        +52 1 (000) 000 0000</a>
                  </li>
                </ul>  
            </div>
        </footer>
    </div>
    
    <!-- SCRIPTS -->
      <!-- JQuery -->
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
