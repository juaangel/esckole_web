@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')

                <a href="/plataforma/Calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')
<?php echo e(json_decode($arrayJson)); ?>
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