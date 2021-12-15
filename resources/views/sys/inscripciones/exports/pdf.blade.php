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
        <h1>Personas de ASPAAH</h1>
    </header>

    <main>
        <table class="resp">
            <thead>
                <tr>
                    <th scope="col">Cod.</th>
                    <th scope="col">Nombres y apellidos</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Número</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Fecha de nacimiento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                <tr>
                    <td>{{ $persona->ID_PERSONA }}</td>
                    <td>{{ $persona->NO_SOCIO }} {{ $persona->AP_PATERNO }} {{ $persona->AP_MATERNO }}</td>
                    <td>{{ $persona->CO_DNI }}</td>
                    <td>{{ $persona->NU_CELULAR }}</td>
                    <td>
                        @if ($persona->TI_SEXO == '1')
                            Varón
                        @else
                            Mujer
                        @endif
                    </td>
                    <td>{{ $persona->FE_NACIMIENTO }}</td>
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
