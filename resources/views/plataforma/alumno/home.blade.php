@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
@endsection
@section('title') Inicio @endsection
@section('content')

    <h1 class="mt-4">Bienvenido alumno {{ session()->get('user')->nom }}</h1>

@endsection
