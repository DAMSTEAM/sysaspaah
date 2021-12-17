<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        @page {
            margin: 0cm 0cm;
            font-family: "Gill Sans Extrabold", Helvetica, sans-serif;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
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

        /* Float four columns side by side */
        .column {
            float: left;
            width: 25%;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {
            margin: 0 -5px;
            margin-top: 30px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;

        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 20px;
            }
        }

        /* Style the counter cards */
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 50px;
            text-align: center;
            background-color: #f1f1f1;
        }

    </style>
</head>

<body>
    <header>
        <h1>Personas de ASPAAH</h1>
    </header>

    <main>
        <div class="row">
            <div class="column">
                <div class="card">
                    <h3>asdadawdadsdad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum molestias quidem quisquam distinctio
                        quae natus ipsum nobis sapiente eum quaerat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <h3>asdadawdadsdad</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum molestias quidem quisquam distinctio
                        quae natus ipsum nobis sapiente eum quaerat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, mollitia?</p>
                </div>
            </div>
    </main>
</body>

</html>
