<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Listar personas</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: "Gill Sans Extrabold", Helvetica, sans-serif;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 30px;
        }

        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #2a0927;
            color: white;
            text-align: center;
            line-height: 35px;
        }

        table {
            width: 100%;
            background: white;
            margin-bottom: 1.25em;
            border: solid 1px #dddddd;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table tr th,
        table tr td {
            padding: 0.5625em 0.625em;
            font-size: 0.875em;
            color: #222222;
            border: 1px solid #dddddd;
            text-align: center;
        }

        table tr.even,
        table tr.alt,
        table tr:nth-of-type(even) {
            background: #f9f9f9;
        }

    </style>
</head>

<body>
    <header>
        <h1>Inscripciones de ASPAAH</h1>
    </header>

    <main>
        <table class="resp">
            <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Estado</th>
                    <th>Cantidad de ingreso</th>
                    <th>Persona solicitada</th>
                    <th>Persona aprobada</th>
                    <th>Fecha de creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscripciones as $inscripcion)
                <tr>
                    <td>{{ $inscripcion->ID_INSCRIPCION }}</td>
                    <td>
                        @if ($inscripcion->ES_INSCRIPCION == '1')
                        Aprobado
                        @elseif($inscripcion->ES_INSCRIPCION == '2')
                        Rechazado
                        @elseif($inscripcion->ES_INSCRIPCION == '3')
                        En curso
                        @else
                        Desactivado
                        @endif
                    </td>
                    <td>{{ $inscripcion->ingreso->CA_PAGO }}</td>
                    <td>{{ $inscripcion->personaSolicitado->NO_SOCIO }}</td>
                    <td>
                        @if (empty($inscripcion->personaAprobado->NO_SOCIO))
                        Sin aprobación
                        @else
                        {{$inscripcion->personaAprobado->NO_SOCIO}}
                        @endif
                    </td>
                    <td>
                        {{$inscripcion->created_at}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    <footer>
        <h1>TEAM DAMS</h1>
    </footer>
</body>

</html>
