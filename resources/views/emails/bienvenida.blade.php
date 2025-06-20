<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenida</title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f4f0ea;
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            color: #3b3028;
            line-height: 1.8;
        }

        .carta {
            max-width: 700px;
            margin: 60px auto;
            background: #fffdf8;
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.07);
            border: 1px solid #e2d6c3;
        }

        h1 {
            font-family: 'EB Garamond', serif;
            font-size: 2.5em;
            font-weight: normal;
            color: #4e3a28;
            text-align: center;
            margin-bottom: 30px;
        }

        p {
            font-size: 1.15em;
            margin: 20px 0;
        }

        .firma {
            font-family: 'EB Garamond', serif;
            font-style: italic;
            text-align: right;
            margin-top: 40px;
            color: #5e4633;
        }

        .resalte {
            font-weight: bold;
            color: #8a623b;
        }

        @media (max-width: 768px) {
            .carta {
                padding: 30px 20px;
                margin: 30px 15px;
            }

            h1 {
                font-size: 2em;
            }

            p {
                font-size: 1em;
            }
        }
    </style>
</head>
<body>
    <div class="carta">
        <h1>Bienvenido/a, {{ $usuario->nombre }}</h1>
        <p>Gracias por unirte a este espacio donde el arte y la palabra se entrelazan con alma y propósito.</p>
        <p>Esta plataforma nace del deseo de compartir las obras y pensamientos de <span class="resalte">Juan Manuel Pérez Torres</span>, y nos honra que decidas formar parte de este viaje.</p>
        <p>Aquí encontrarás cuadros que hablan sin voz y libros que pintan sin pincel. Estás invitado a explorar con calma, con curiosidad, con el corazón abierto.</p>
        <p>Si en algún momento necesitas acompañamiento o tienes alguna inquietud, no dudes en contactarme.</p>
        <p class="firma">Con afecto,<br>Juan Manuel Pérez Torres</p>
    </div>
</body>
</html>
