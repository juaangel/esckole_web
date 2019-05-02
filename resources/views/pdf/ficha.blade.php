<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ficha de inscripción</title>
    <style type="text/css">
        * {
          font-family: Roboto, Verdana, Aial, sans-serif;
        }
        .container {
            width: 21cm;
        }
        th[scope="row"]{
            width: 6cm;
        }
        .font-weight-light {
            font-weight: lighter;
        }
        .school{
            position: relative;
        }
        .inline{
            display: inline-table;
        }
    </style>
  </head>
  <body>

    <main>
        <div class="container">
            <h1 class="font-weight-light">Ficha de inscripción</h1>

            <h4>Folio: <b>{{ $datos['folio'] }}</b></h4>

            <table class="table table-borderless table-sm ml-3">
                <tbody>
                    <tr>
                        <th scope="row">Nombre:</th>
                        <td>{{ $datos['nom'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido paterno:</th>
                        <td>{{ $datos['apeP'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Apellido materno:</th>
                        <td>{{ $datos['apeM'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Número de teléfono:</th>
                        <td>+{{ $datos['tel'] }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha de solicitud:</th>
                        <td><b>{{ $datos['date'] }}</b></td>
                    </tr>
                </tbody>
            </table>

            <br><div class="inline">
                <img class="mr-3" id="logo" src="img/logo.png" height="45" alt="CBTa logo">
                <p class="school">Centro de Bachillerato Tecnológico <br>Agropecuario No. 309 "Congregación Hidalgo"</p>
            </div>
        </div>
    </main>

  </body>
</html>
