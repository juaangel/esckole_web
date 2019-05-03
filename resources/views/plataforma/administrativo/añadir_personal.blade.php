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

<div class="container mt-4">
    <h3><i class="fas fa-user mr-3"></i>{{$datos->nom.' '.$datos->apeP.' '.$datos->apeM}}</h3>
    <h6 class="text-uppercase">{{Session::get('user')->tipo}}</h6>
  <div  style="padding-top: 20px; padding-left: 40px; padding-right: 40px;">
  <div class="card">
    <div class="card-header" style="background-color: #1468D3   ; color: white;">
     REGISTRO DE PERSONAL
    </div>
    <div class="card-body" >
      <form class="login" method="POST" action="{{ url('/plataforma/añadir_persona') }}">
        {{csrf_field()}}
            
            <table class="table table-borderless table-sm; center-block">
                <tbody>
                    <tr>
                        <label>Nombre:</label> 
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu Nombre" name="nom">

                    </tr>
                    <tr>
                        <label scope="row">Apellido paterno:</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu primer apellido" name="paterno">

                    </tr>
                    <tr>
                        <label> Apellido materno:</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu segundo apellido" name="materno">

                    </tr>
                    <tr>
                        <label scope="row">Fecha de nacimiento:</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="aaaa/mm/dd" name="f_naci">

                    </tr>
                    <tr>
                        <label scope="row">CURP:</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Escribe tu CURP" name="curp">

                    </tr>
                    
                     <tr>
                        <label scope="row">Tipo de Empleado:</label>
                      <select  class="form-control" name="tipo">
                        <option value="1">
                          Administrativo
                        </option>
                        <option value="2">
                          Maestro
                        </option>
                      </select>

                    </tr>
                    <tr>   <button type="submit" class="btn btn-primary">REGISTRAR</button>
                      </tr>
                 </tbody>
            </table>
             </form>
    </div>
  </div>
</div>  

@endsection
