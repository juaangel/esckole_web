@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')

                <a href="/plataforma/Calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')
{{$califList}}
<div class="table-responsive-sm">
  <table class="table">
  	  <thead>
    <tr>
      <th scope="col">Profesor:</th>
      <th scope="col">Materia:</th>
      <th scope="col">Unidad:</th>
      <th scope="col">Promedio:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
    		  @foreach ($califList as $user)
            <tr>
                <td>{{$user['maestro']}}</td>
                <td>{{$user['materia']}}</td>
                @foreach ($user['califs'] as $cali)
                <td>{{$cali}}</td>
                <td>{{$user['prom']}}</td>
            </tr>
                @endforeach
              @endforeach
    </tr>
  </tbody>
  </table>
</div>
@endsection