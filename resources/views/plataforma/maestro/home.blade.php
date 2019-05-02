@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="/plataforma/maestro/calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Inicio @endsection
@section('content')

    <h1 class="mt-4">Bienvenido maestro {{ session()->get('user')->nom }}</h1>

@endsection
