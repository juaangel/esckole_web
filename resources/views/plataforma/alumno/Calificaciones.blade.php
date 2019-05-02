@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')

                <a href="/plataforma/Calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')
<div class="table-responsive-sm col-md-12">
  <table class="table">
 <thead class="col-md-12">
    <tr>
      <th scope="col">Profesor:</th>
      <th scope="col">Materia:</th>
      <th scope="col">Promedio:</th>
      <th scope="col-md-1" class="col-md-1">Unidad:</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($califList as $user)
    <tr>
        <td class="col-md-1">{{$user['maestro']}}</td>
        <td class="col-md-1">{{$user['materia']}}</td>
        <td class="col-md-1">{{$user['prom']}}</td>
                @foreach ($user['califs'] as $cali)
        <td class="col-md-1">{{$cali}}</td>
                 @endforeach
        @endforeach
    </tr>
  </tbody>
  </table>
</div>
@endsection