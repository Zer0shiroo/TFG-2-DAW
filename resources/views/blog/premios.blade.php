<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premios y Reconocimientos | Blog Juan Manuel Perez Torres</title>
    <link href="{{ asset('css/blog/premios.css') }}" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

    <div class="hero">
     
        
        <main class="hero-content">
            <div class="left">
                <p class="autor">Reconocimientos de Juan Manuel Pérez Torres</p>
                <h1><span>Premios</span> & Trayectoria</h1>
                <p class="disponible">Celebrando una vida dedicada al arte y la palabra</p>
            </div>
        </main>

       
    </div>

    <section class="seccion-oscura">
        <div class="bloque">
            <div class="texto">
                <h2>🎖 Reconocimiento artístico</h2>
                <p>
                    A lo largo de su carrera, <strong>Juan Manuel Pérez Torres</strong> ha sido distinguido por su sensibilidad, autenticidad y maestría tanto en la pintura como en la literatura. Sus obras han cruzado fronteras, tocando corazones y despertando reflexión en distintos rincones del mundo.
                    <br><br>
                    Entre sus logros más destacados se encuentran:
                    <ul>
                        <li>🏆 <strong>Premio Nacional de Acuarela Contemporánea (2015)</strong> – por su serie "Horizontes Suspendidos".</li>
                        <li>🏆 <strong>Gran Premio del Mar (2018)</strong> – otorgado por la Asociación Internacional de Pintores del Litoral.</li>
                        <li>📖 <strong>Mención de Honor en el Certamen de Microrrelatos de Barcelona (2020)</strong>.</li>
                        <li>🎨 <strong>Exposición individual en la Bienal de Pintura Emocional (2022)</strong>.</li>
                        <li>🖋️ <strong>Finalista del Premio Nacional de Poesía Introspectiva (2023)</strong>.</li>
                    </ul>
                    Más que una colección de trofeos, estos reconocimientos son testimonio de una trayectoria construida con pasión, honestidad y una profunda conexión con la belleza de lo cotidiano.
                </p>
            </div>
            <div class="marco">
                <img src="{{ asset('images/juanmanuel.png') }}" alt="Premios de Juan Manuel">
            </div>
        </div>
    </section>
   
    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu-desplegable');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        window.addEventListener('click', function (e) {
            const menu = document.getElementById('menu-desplegable');
            const avatar = document.querySelector('.usuario img');
            if (!menu.contains(e.target) && !avatar.contains(e.target)) {
                menu.style.display = 'none';
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            const bloque = document.querySelector(".bloque");
            const hero = document.querySelector(".hero");
            setTimeout(() => {
                hero.classList.add("visible");
                bloque.classList.add("visible");
            }, 300);
        });
    </script>
</body>
</html>
