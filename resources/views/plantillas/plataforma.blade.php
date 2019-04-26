<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <!-- Bootstrap CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <!-- Nuestro CSS -->
    <link href="/css/styles/style.css" rel="stylesheet">
    <link href="/css/styles/plataforma/plataforma.css" rel="stylesheet">
    @yield('extraCSS')

    <link rel="icon" type="image/png" href="favicon.ico">
    <title>CBTa 309 - Plataforma</title>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <img class="mr-md-1" id="logo" src="/img/logo.png" height="32" alt="CBTa logo">
                Plataforma escolar</div>
            <div class="list-group list-group-flush">
                <a href="/plataforma" class="list-group-item list-group-item-action bg-light">Inicio</a>
                @yield('menu')
                <a href="#" class="list-group-item list-group-item-action bg-light">Datos personales</a>
            </div>
        </div>
        <!-- /Sidebar-->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-sm navbar-dark blue-gradient border-bottom">
                <button class="btn btn-sm btn-primary" id="menu-toggle"><i class="fas fa-align-left"></i></button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <!--<li class="nav-item">
                            <a class="nav-link" href="#">Item</a>
                        </li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i>
                                {{ session()->get('user')->nom }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/cerrarSesion">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <!-- SCRIPTS -->
      <!-- JQuery -->
      <script type="text/javascript" src="/js/jquery-3.3.1.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="/js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="/js/mdb.min.js"></script>

   <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
    <!-- jQuery -->
        @yield('script')

</body>
</html>
