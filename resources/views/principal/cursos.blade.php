@extends('principal.plantilla')
@section('extraCSS')
    <link rel="stylesheet" href="css/styles/principal/cursos.css">
@endsection
@section('title') Cursos @endsection
@section('content')

 <div class="container main-container">
     <div id="cursos" class="row">
         <div class="col-md">
           <h1 class="title-1 escko-green-3 text-center">Sistema escolarizado</h1>
            <img class="img-curso img-fluid rounded mx-auto d-block img-cursos" src="img/cursos/escolar.jpg" alt="Escolar - Ofimatica">
             <p class="p-cursos">Estudia con nosotros mediante estrategias de enseñanza y aprendizaje enfocadas  a través de la relación alumno-maestro en un aula. <br>
             Su estructura curricular está organizada en seis semestres, integrados por módulos y asignaturas. </p>

             <div class="row">
                 <div class="col-lg-3">
                    <h3 class="title-2 escko-green-2">Carrera</h3>
                    <p><b>OFIMÁTICA</b></p>
                 </div>
                 <div class="col">
                     <h3 class="title-2 escko-green-2">Duración</h3>
                     <p>3 años</p>
                 </div>
             </div>
         </div>
         <div class="col-md">
             <h1 class="title-1 escko-green-3 text-center">Sistema auto-planeado</h1>
            <img class="img-curso img-fluid rounded mx-auto d-block img-cursos" src="img/cursos/auto.jpg" alt="Escolar - Ofimatica">
             <p class="p-cursos"><b>SAETA</b> es un sistema de auto planeado de Educación Tecnológica Agropecuaria para aquellas personas que no podido terminar su bachillerato y que al estar trabajando, no tienen tiempo entre semana. <br> Asistirás solamente los sábados al plantel. <br>
             <a class="escko-green-3" href="http://saeta.uemstaycm.sems.gob.mx" target="_blank">Página web de SAETA</a></p>

            <div class="row">
                 <div class="col-lg-3">
                    <h3 class="title-2 escko-green-2">Carrera</h3>
                    <p><b>AGROPECUARIA</b></p>
                 </div>
                 <div class="col">
                     <h3 class="title-2 escko-green-2">Duración</h3>
                     <p>2 años</p>
                 </div>
             </div>
         </div>
     </div>
 </div>

@endsection
