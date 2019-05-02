@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')

                <a href="/plataforma/Calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')
<div class="col-md-15 table-responsive-sm">
  <table class="table">
 <thead>
    <tr class="col-md-12">
      <th scope="col">Profesor:</th>
      <th scope="col">Materia:</th>
      <th scope="col">Promedio:</th>
      <th scope="col"">Unidad:</th>
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