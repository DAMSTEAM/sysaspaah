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
        <h1>Socios de ASPAAH</h1>
    </header>

    <main>
        <table class="resp">
            <thead>
                <tr>
                    <th>Cod.</th>
                    <th>Nombres y apellidos</th>
                    <th>DNI</th>
                    <th>Número</th>
                    <th>Sexo</th>
                    <th>Fecha de nacimiento</th>
                    <th>Comunidad</th>
                    <th>Distrito</th>
                    <th>Provincia</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socios as $socio)
                <tr>
                    <td>{{ $socio->ID_SOCIO }}</td>
                    <td>{{ $socio->persona->NO_SOCIO }} {{ $socio->persona->AP_PATERNO }} {{ $socio->persona->AP_MATERNO }}</td>
                    <td>{{ $socio->persona->CO_DNI }}</td>
                    <td>{{ $socio->persona->NU_CELULAR }}</td>
                    <td>
                        @if ($socio->persona->TI_SEXO == '1')
                        Varón
                        @else
                        Mujer
                        @endif
                    </td>
                    <td>{{ $socio->persona->FE_NACIMIENTO }}</td>
                    <td>{{ $socio->comunidad->NO_COMUNIDAD }}</td>
                    <td>{{ $socio->comunidad->distrito->NO_DISTRITO }}</td>
                    <td>{{ $socio->comunidad->distrito->provincia->NO_PROVINCIA }}</td>
                    <td>{{ $socio->comunidad->distrito->provincia->departamento->NO_DEPARTAMENTO }}</td>
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
