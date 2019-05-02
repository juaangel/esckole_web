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

<!--foreach ($califList as $user)
    <p>This is user </p>
endforeach-->
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>Profesor:</th>
                <th>Materia:</th>
                <th>Promedio:</th>
                <th>Unidad:</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
<div class="table-responsive-sm">
  <table class="table">
    ...
  </table>
</div>

<div class="table-responsive-md">
  <table class="table">
    		  @foreach ($califList as $user)
            <tr>
                <td>{{$user['maestro']}}</td>
                <td>{{$user['materia']}}</td>
                <td>{{$user['prom']}}</td>
                @foreach ($user['califs'] as $cali)
                <td>{{$cali}}</td>
            </tr>
                @endforeach
              @endforeach
  </table>
</div>

<div class="table-responsive-lg">
  <table class="table">
    ...
  </table>
</div>

<div class="table-responsive-xl">
  <table class="table">
    ...
  </table>
</div>

@endsection