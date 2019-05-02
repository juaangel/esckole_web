@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')

                <a href="/plataforma/Calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')
<div class="table">
  <table class="table">
  	  <thead>
    <tr>
      <th scope="">Profesor:</th>
      <th scope="">Materia:</th>
      <th scope="">Promedio</th>
      <th scope="">Unidad:</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($califList as $user)
    <tr>
        <td>{{$user['maestro']}}</td>
        <td>{{$user['materia']}}</td>
        <td>{{$user['prom']}}</td>
                @foreach ($user['califs'] as $cali)
        <td>{{$cali}}</td>
                 @endforeach
        @endforeach
    </tr>
  </tbody>
  </table>
</div>
@endsection