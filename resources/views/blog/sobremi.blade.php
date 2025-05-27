<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sobre mi | Juan Manuel Pérez Torres</title>
    <link href="{{ asset('css/blog/sobremi.css') }}" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

    <div class="sobremi">
        <h1 class="sobremi__titulo">Sobre mí</h1>
    
        <p class="sobremi__texto">
           <strong>Juan Manuel Pérez Torres</strong> (diciembre 1956), artista nacido en Fuentes de León (Badajoz), aunque malagueño de corazón, pues vivo en Málaga desde los ocho meses de edad. Crecí en una familia de artistas y he compaginado durante toda mi vida la pintura y la literatura, con una trayectoria reconocida en ambas disciplinas a través de múltiples certámenes y exposiciones.
        </p>
            <img src="{{ asset('images/sobremi1.png') }}" alt="Estudio de arte" class="sobremi__foto">

        <p class="sobremi__texto">
            Aunque mi carrera profesional como funcionario me ha llevado a residir temporalmente en distintas ciudades, mi vínculo con el arte ha sido constante. Como pintor, he expuesto mi obra individual y colectivamente en más de 30 ocasiones en salas de Madrid, León, Valladolid, Vigo, Cádiz, Jerez de la Frontera y, por supuesto, Málaga.
        </p>
    
    
        <p class="sobremi__texto">
            En el ámbito literario he sido premiado y finalista en diversos concursos de poesía y microrrelato. En 2022 fui seleccionado para formar parte de la antología internacional de microficción "Los locos del microrrelato", publicada por la editorial peruana Quarks. 
        </p>
            <img src="{{ asset('images/sobremi2.png') }}" alt="Obra colorida" class="sobremi__foto">

        <p class="sobremi__texto">
            He publicado los poemarios <em>Ausencia de plomo</em> (Colección Euterpe, Madrid) y <em>Mi última ternura</em> (Colección Peñón del Cuervo, Málaga). En narrativa, presenté mi primer libro de microrrelatos <em>Recados veniales</em> (Editorial Anáfora, 2022), donde además muestro mis propias ilustraciones. Más recientemente, publiqué <em>Debida cuenta</em> (Editorial Platero Coolbooks, 2025), una obra que reúne 12 relatos cortos y 40 microrrelatos.
        </p>
            <img src="{{ asset('images/sobremi3.png') }}" alt="Foto de Juan Manuel" class="sobremi__foto">

    
        <p class="sobremi__texto">
            En este sitio podrás conocer más sobre mi recorrido artístico, tanto en pintura como en escritura. Si te interesa mi obra o deseas proponer una colaboración, estaré encantado de escuchar tus ideas. Gracias por compartir este espacio conmigo.
        </p>
    
    </div>

</body>
</html>
