<?php

//Página principal / de inicio
include 'rutas/principal.php';

//Plataforma estudiantil
include 'rutas/plataforma.php';

Route::get('/prueba', 'Controller@prueba');
