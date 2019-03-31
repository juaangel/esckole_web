@extends('principal.plantilla')
@section('extraCSS')
    <link rel="stylesheet" href="css/styles/principal/cursos.css">
@endsection
@section('title') Cursos @endsection
@section('content')

 <div class="container main-container">
     <div id="cursos" class="row">
         <div class="col-md">
           <h1 class="title-1 escko-green-3 text-left">Sistema escolarizado</h1>
            <img id="img-ofimatica" class="img-fluid rounded mx-auto d-block img-cursos" src="img/cursos/ofimatica.png" alt="Escolar - Ofimatica">
             <p class="p-cursos">Estudia con nosotros mediante estrategias de enseñanza y aprendizaje enfocadas  a través de la relación alumno-maestro en un aula.<br>
             Desarrollate como un técnico profesional en <strong class="escko-green-1 nom-carrera"><b>OFIMÁTICA</b></strong>.</p>
         </div>
         <div class="col-md">
             <h1 class="title-1 escko-green-3 text-left">Sistema auto-planeado</h1>
            <img class="img-fluid rounded mx-auto d-block img-cursos" src="img/cursos/ofimatica.png" alt="Escolar - Ofimatica">
             <p class="p-cursos">Estudia con nosotros mediante estrategias de enseñanza y aprendizaje enfocadas  a través de la relación alumno-maestro en un aula.<br>
             Desarrollate como un técnico profesional en <strong class="escko-green-1 nom-carrera"><b>OFIMÁTICA</b></strong>.</p>
         </div>
     </div>
 </div>

@endsection
