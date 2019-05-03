@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="/plataforma/añadir_alumno" class="list-group-item list-group-item-action bg-light">Inscripciones</a>
    <a href="/plataforma/añadir_persona"" class="list-group-item list-group-item-action bg-light">Añadir personal</a>
@endsection
@section('title') Inicio @endsection
@section('content')

    <h1 class="mt-4">Bienvenido administrativo {{ session()->get('user')->nom }}</h1>

@endsection
