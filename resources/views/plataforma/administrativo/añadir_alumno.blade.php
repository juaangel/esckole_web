@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="/plataforma/añadir_alumno" class="list-group-item list-group-item-action bg-light">Inscripcion</a>
    <a href="/plataforma/añadir_persona" class="list-group-item list-group-item-action bg-light">Añadir personal</a>
@endsection
@section('title') Añadir Personal @endsection
@section('content')
<div class="container" style="background-color: white; text-align: center;" >    
          @foreach($aspirantes as $p)
  <table class="table table-hover">
  <thead>
    <tr>
      <th>#Folio</th>
      <th>Nombre</th>
       <th>Apellido P</th>
      <th>Apellido M</th>
      <th>Telefono</th>
    <th>Fecha de Solicitud</th>
          <th>Dar de Alta</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{$p->folio}}</td>
      <td>{{$p->nom}}</td>
      <td>{{$p->apeP}}</td>
      <td>{{$p->apeM}}</td>
      <td>{{$p->apeM}}</td>
      <td>{{$p->created_at}}</td>
     <td>
        <a href="{{url('/plataforma/altaAlumno/'.$p->folio)}}" class="btn btn-outline-warning pull-right" role="button"><span class="">Añadir</span></a>
     </td>
        @endforeach
    </tr>
  </tbody>
  </table> 
</div>
    
@endsection