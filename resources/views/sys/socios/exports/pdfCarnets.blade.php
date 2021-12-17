<!DOCTYPE html>
<html lang="en">

<head>
    <title>CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Style the header */
        .header {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
            font-size: 35px;
        }

        /* Container for flexboxes */
        .row {
            display: flex;
            flex-direction: column;
        }

        /* Create three equal columns that sits next to each other */
        .column {
            padding: 10px;
            height: 360px;
            /* Should be removed. Only for demonstration */
        }

        /* Style the footer */
        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }

        @media (max-width: 900px) {
            .row {
                flex-direction: column;
            }
        }

    </style>
</head>

<body>
    <div class="header">
        <h2>foto</h2>
    </div>

    <div class="row">
        <div class="column" style="background-color:#aaa;">
            <table style="border: hidden">
                <tbody style="border: hidden">
                    <tr style="border: hidden">
                        <td style="border: hidden">DATOS PERSONALES:</td>
                        <td style="border: hidden"></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr style="border: hidden">
                        <td style="border: hidden">Nombres y apellidos:</td>
                        <td style="border: hidden">2a</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">DNI:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Número de celular:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Género:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Fecha de nacimiento:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr style="border: hidden">
                        <td style="border: hidden">DATOS PERSONALES:</td>
                        <td style="border: hidden"></td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Comunidad de:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Distrito de:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Provincia de:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                    <tr style="border: hidden;"></td>
                        <td style="border: hidden;">Departamento de:</td>
                        <td style="border: hidden">sdad</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="footer">
        Firma del socio
    </div>
    <div class="footer">
        <hr width="300px">
    </div>
    <div class="footer">
        Firma del Presidente
    </div>
    <div class="footer">
        <hr width="200px">
    </div>
</body>

</html>
