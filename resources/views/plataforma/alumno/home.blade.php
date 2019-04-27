@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="#" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
    <a href="#" class="list-group-item list-group-item-action bg-light d-flex justify-content-between align-items-center">Notificaciones<span class="badge badge-primary badge-pill">0</span></a>
    <a href="#" class="list-group-item list-group-item-action bg-light">Pagos</a>
@endsection
@section('title') Inicio @endsection
@section('content')

    <h1 class="mt-4">Bienvenido alumno {{ session()->get('user')->nom }}</h1>

@endsection
