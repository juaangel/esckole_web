@extends('plantillas.plataforma')
@section('extraCSS')
    <!--<link rel="stylesheet" href="css/styles/plataforma/???.css">-->
@endsection
@section('menu')
    <a href="/plataforma/maestro/calificaciones" class="list-group-item list-group-item-action bg-light">Calificaciones</a>
@endsection
@section('title') Calificaciones @endsection
@section('content')

<div id="container" class="container mt-4">
    <h3>Calificaciones</h3>

    <div class="row">
       @php
           $i = 0;
       @endphp
        @foreach($califs as $calif)
           @php $i++ @endphp
            <form action="/upCalif" method="post">
               {{csrf_field()}}
                <div class="col-md">
                  <input name="id" type="hidden" value="{{$calif->id}}">
                   <label for="unidad">Unidad {{$i}}</label>
                    <input name="calif" class="form-control" type="text" value="{{$calif->calificacion}}">
                </div>
                <div class="col-md">
                    <button class="btn blue-gradient btn-sm">Actualizar</button>
                </div>
            </form>
        @endforeach
    </div>

@endsection
