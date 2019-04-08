@extends('principal.plantilla')
@section('extraCSS')
    <link rel="stylesheet" href="css/styles/principal/inicio.css">
@endsection
@section('title') Inicio @endsection
@section('content')

<!-- Banner / Nombre de escuela -->
<div id="banner" class="w-100 d-flex justify-content-center align-items-center text-center">
    <p class="container font-weight-bolder text-white">
        CENTRO DE BACHILLERATO TECNOLÓGICO AGROPECUARIO <br>
        No. 309 "CONGREGACIÓN HIDALGO"
    </p>
</div>

<h4 id="subtitle1" class="text-center font-weight-bolder">¿Quiénes somos?</h4>
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam interdum imperdiet
                tortor molestie facilisis. Nunc convallis erat eget nibh consequat, id viverra metus
                imperdiet. Mauris non lacus urna. Nulla sagittis blandit orci, eget aliquet magna
                commodo at. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                Phasellus sit amet cursus lectus. Aliquam nec auctor tellus. Mauris felis sapien,
                elementum in ex et, viverra dictum ipsum. Mauris orci lorem, interdum pharetra
                gravida non, aliquam nec enim. Donec varius enim nisl, pellentesque vestibulum elit
                iaculis ac. Etiam ut dui ipsum. Class aptent taciti sociosqu ad litora torquent per
                conubia nostra, per inceptos himenaeos.
                Proin aliquam metus vitae urna dictum blandit. Suspendisse id orci eget nibh luctus
                laoreet. Nullam maximus mollis metus ac sollicitudin. Suspendisse pulvinar ac diam
                at porttitor. <br><br>
                Quisque augue leo, pretium in consectetur in, ultrices id tellus. Integer
                ultrices tellus et lectus aliquam varius. Praesent nec mattis ex. Duis pulvinar molestie
                lobortis. Donec egestas purus neque, eget congue leo pellentesque eget. Nam sed
                nibh sodales, dapibus nunc id, feugiat libero.

            </p>
        </div>
        <div class="col-lg">
            <img class="img-fluid" src="img/inicio/quienes_somos.jpg" alt="">
        </div>
    </div>
    
    <div class="row text-center white-text" style="margin-top: 30px;">
        <div id="mision" class="col">
            <h4 class="white-sub">Misión</h4>
            <p>Ofrecer una formación integral, social, humanista y
                tecnológica centradas en la persona, que consolide el
                conocimiento hacia el sector rural, fortalezca la
                pertinencia, fomente la mentalidad emprendedora y de
                liderazgo.</p>
        </div>
        <div id="vision" class="col">
            <h4 class="white-sub">Visión</h4>
            <p>Constituirse como una unidad educativa de calidad
                para el desarrollo de la sociedad. Ser generador de la
                capacidad, habilidad y destreza en las actividades
                agropecuarias.
                Fomentar una mejor forma de vida a la comunidad de
                la región.</p>
        </div>
    </div>
    
    <h3 class="text-center font-weight-bolder cursos">CURSOS</h3>
    <div id="cursos" class="text-center" style="margin-top: 17px; margin-bottom: 60px;">
        <div class="view overlay zoom">
           <a href="/cursos">
               <img class="img-fluid rounded mx-auto d-block img-cursos" src="img/inicio/ofimatica.png" alt="Escolar - Ofimatica"
                style="margin-bottom: 20px;">
           </a>
        </div>
        <div class="view overlay zoom">
           <a href="/cursos">
               <img class="img-fluid rounded mx-auto d-block img-cursos" src="img/inicio/agropecuario.png" alt="Escolar - Ofimatica">
           </a>
        </div>
    </div>
</div>

@endsection
