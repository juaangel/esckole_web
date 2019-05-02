@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="Calificaciones.blade.php" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Inicio @endsection
@section('content')

    <h1 class="mt-4">Bienvenido alumno {{ session()->get('user')->nom }}</h1>

@endsection
