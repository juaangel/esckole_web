@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')

                <a href="/plataforma/Calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')

    <h1 class="mt-4">Calificaciones del alumno: {{$datos->nom.' '.$datos->apeP.' '.$datos->apeM}}</h1>
    @foreach ($califList as $user)
    <p>This is user {{ $user->materia }}</p>
@endforeach
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>Profesor:</th>
                <th>Materia:</th>
                <th>Unidad:</th>
                <th>Promedio:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Ana Delia Torres</td>
                <td>Química</td>
                <td>Unidad 1</td>
                <td>90</td>
            </tr>
        </tbody>
    </table>
@endsection