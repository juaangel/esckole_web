@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="#" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
    <!--SOLO CUANDO ES TUTOR DE UN GRUPO-->
    <a href="#" class="list-group-item list-group-item-action bg-light">Mis grupos</a>
@endsection
@section('content')

    <h1 class="mt-4">Bienvenido maestro {{ session()->get('user')->nom }}</h1>

@endsection
