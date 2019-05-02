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

    <form action="/getTable" method="post" class="form-row d-flex d-flex align-items-center justify-content-center">
       {{csrf_field()}}
       <input type="hidden" name="materias" value="{{$materias}}">
        <div class="col-xs">
            <select class="form-control" name="grupo">
              @php  $grupos = $materias->groupBy('id')  @endphp
              <option value="nada" selected>Grupo</option>
               @foreach($grupos as $grup)
                   <option value="{{$grup->first()->id}}">{{$grup->first()->Grupo}}</option>
               @endforeach
            </select>
        </div>
        <div class="col-xs">
            <select class="form-control" name="materia">

            </select>
        </div>
        <div class="col-xs">
            <button id="geCalifsBtn" type="submit" class="btn blue-gradient btn-sm"><i class="fas fa-arrow-circle-right fa-2x"></i></button>
        </div>
    </form>

    @if(Session::has('datos'))
    {{--<h4>{{Session::get('grupo')}}, {{Session::get('materia')}}</h4>--}}
    <table class="table mt-3 table-hover">
        <thead>
            <tr>
                <th scope="col">Matrícula</th>
                <th scope="col">Alumno</th>
                <th scope="col">Promedio</th>
                <th scope="col">Modificar</th>
            </tr>
        </thead>
        <tbody>
           @foreach(Session::get('datos') as $dat)
               <tr id="row">
                    <th scope="row">{{$dat->matricula}}</th>
                    <td>{{$dat->alumno}}</td>
                    <td>{{ substr($dat->promedio, 0, -3)}}</td>
                    <form action="/plataforma/maestro/calificaciones/unidades" method="post">
                       {{csrf_field()}}
                        <input type="hidden" name="matricula" value="{{$dat->matricula}}">
                        <input type="hidden" name="materia_id" value="{{Session::get('materia_id')}}">
                        <td><button type="submit" class="btn blue-gradient btn-sm my-0">Ver</button></td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif

</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        var materias = $("input[name='materias']").val(),
            _token = '{{csrf_token()}}';

        var getCalifsBtn = $('#geCalifsBtn'),
            selectGrupo = $("select[name='grupo']"),
            selectMateria = $("select[name='materia']"),
            tableRow = $('#row'),
            modalUnidades = $('#modal-unidades'),
            container = $('#container');

        getCalifsBtn.hide();
        selectMateria.hide();

        selectGrupo.change(function(){
            var grupo_id = $(this).children('option:selected').val();

            if(grupo_id != 'nada'){
                $.ajax({
                    url: '/getMaterias',
                    data: {_token, grupo_id, materias},
                    type: 'POST',
                    dataType: 'json',
                    error: function(response){
                        console.log(response.responseText);
                    },
                    success: function(response){
                        selectMateria.empty();

                        $.each(response, function(index, value){
                            selectMateria.prepend("<option value="+value.materia_ID+">"+value.Materia+"</option>");
                        });

                        selectMateria.prepend("<option value='nada' selected>Materia</option>");
                    }
                });

                selectMateria.show();
            }
        });

        selectMateria.change(function(){
            var materia_id = $(this).children('option:selected').val();

            if(materia_id != 'nada'){
                getCalifsBtn.show();
            }
        });
    });
</script>
@endsection
