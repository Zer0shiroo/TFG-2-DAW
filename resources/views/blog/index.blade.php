<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Juan Manuel Perez Torres</title>
    <link href="{{ asset('css/blog/index.css') }}" rel="stylesheet">
</head>
<body>
    <div class="hero">
        <header class="top-bar">
            <p class="sitiooficial">Sitio oficial</p>
            <div class="usuario">
                @if(Auth::check())
                <span class="saludo"> Bienvenido, {{ Auth::user()->nombre }}! </span>
                @if(Auth::user()->avatar)
                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar de {{ Auth::user()->name }}" onclick="toggleMenu()">
                @else
                    <img src="{{ asset('images/default-avatar.jpg') }}" alt="Avatar por defecto" onclick="toggleMenu()">
                @endif

                <div id="menu-desplegable" class="menu-desplegable">
                    <a href="{{ route('verPerfil') }}" >👤 Ver perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="cerrarsesion">🚪 Cerrar sesión</button>
                    </form>
                </div>
            @else
                <span class="saludo">Bienvenido, visitante 👋</span>
                <a href="{{ route('login') }}" class="boton-login">Iniciar sesión</a>
            @endif

                <div id="menu-desplegable" class="menu-desplegable">
                    <a href="{{ route('verPerfil') }}" >👤 Ver perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="cerrarsesion">🚪 Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </header>





        <main class="hero-content">
            <div class="left">
                <p class="autor">Obras de Juan Manuel Perez Torres</p>
                <h1><span>Arte y</span>Literatura</h1>
                <p class="disponible">El arte y literatura son mi busqueda constante</p>



            <button class="menu-toggle" onclick="document.querySelector('.mobile-menu').classList.toggle('active')">☰ Obras de Juan Manuel</button>

                <div class="mobile-menu">
                    <a href="{{ route('cuadros') }}">🖼️ Galería</a>

                    <div class="submenu-container">
                        <a href="#" class="submenu-trigger" onclick="event.preventDefault(); this.nextElementSibling.classList.toggle('visible')">📖 Literatura ▾</a>
                        <div class="submenu">
                            <a href="{{ route('RelatoMicrorrelato') }}">✍️ Relato y Microrrelato</a>
                            <a href="{{ route('poesia') }}">🎭 Poesía</a>
                        </div>
                    </div>

                    <a href="{{ route('premios') }}">⭐ Premios y reconocimientos</a>
                    <a href="{{ route('sobremi') }}">Sobre mí</a>

                </div>

                <div class="botones">
                    <div class="dropdown">
                        <button class="trailer" onclick="toggleDropdown()">Obras de Juan Manuel ▾</button>
                        <div class="dropdown-menu" id="dropdown-menu">
                            <a href="{{ route('cuadros') }}">🖼️ Galería</a>

                            <div class="submenu-container">
                                <a href="#" class="submenu-trigger">📖 Literatura ▸</a>
                                <div class="submenu">
                                    <a href="{{ route('RelatoMicrorrelato') }}"> ✍️Relato y Microrrelato</a>
                                    <a href="{{ route('poesia') }}"> 🎭 Poesía</a>
                                </div>
                            </div>

                            <a href="{{ route('premios') }}">⭐ Premios y reconocimientos</a>
                        </div>
                    </div>

                    <a href="{{ route('sobremi') }}">
                        <button class="ver-ahora">Sobre mí</button>
                    </a>
                    @if(isset($visita))
                        <div class="contador-visitas">
                        <p>📊 <strong>Visitas:</strong> {{ $visita->contador }}</p>
                         </div>
                            @endif

                </div>
            </div>


        </main>

        <footer>
            <p>Términos y Condiciones · Política de privacidad</p>
            <p>&copy; 2025 Creado por Juan Manuel Perez Torres</p>
        </footer>
    </div>
    <section class="seccion-oscura">

        <div class="bloque">
            <div class="texto">
                <h2>📖 La palabra como herencia</h2>
                <p>
                    A escribir empecé en el instituto, tendría unos doce años. No fue por casualidad: mi tío Antonio, hermano de mi padre, era un lector empedernido y un apasionado de la poesía. Recuerdo sus visitas como si fueran ceremonias íntimas: llegaba con libros bajo el brazo y recitaba versos como quien revela un secreto. Aquello me marcó profundamente. Empecé por curiosidad, por imitación quizás, pero pronto descubrí en la escritura un espacio de libertad que no encontraba en ningún otro lugar.
                    <br><br>
                    Al principio escribía sin rumbo, pequeñas historias que nacían de lo cotidiano, de lo que me dolía o me asombraba. Con el tiempo, las palabras se fueron volviendo más certeras, más conscientes. Influido por autores clásicos, desarrollé una voz que no buscaba describir la realidad, sino reinterpretarla desde dentro. Cada relato, cada poema, era una ventana hacia el yo más profundo.
                    <br><br>
                    Hoy la literatura es mucho más que una pasión: es mi manera de estar en el mundo. Escribo para recordar, para entender, para tocar algo invisible que late entre las cosas. Mis textos hablan de soledades compartidas, de amores que se escapan entre los dedos, de la belleza que vive en lo fugaz. No quiero ofrecer respuestas, sino preguntas. No busco certezas, sino resonancias. Escribir, para mí, es un acto de entrega.
                </p>
            </div>

            <div class="marco">
                <img src="{{ asset('images/cuadro1.png') }}" alt="Libros de Juan Manuel">
            </div>
        </div>

        <div class="bloque invertido">

            <div class="texto">
                <h2>🎨 Pintar con el alma desde la infancia</h2>
                <p>
                    Pinto desde que tenía 9 años, cuando acompañaba a mi padre en sus salidas al aire libre con el caballete al hombro y los pinceles aún húmedos del último paisaje. Me sentaba a su lado, sin entender del todo lo que hacía, pero sintiendo que aquella costumbre tenía algo especial. Él observaba el horizonte como si fuera un misterio por descifrar, y yo, en mi silencio infantil, intentaba traducir en formas y colores lo que él no decía con palabras.
                    <br><br>
                    Aquel gesto cotidiano se convirtió en un puente emocional entre nosotros, pero también en la semilla de una pasión que no ha dejado de crecer. Con el tiempo, la pintura dejó de ser una simple actividad compartida: se transformó en mi forma de pensar, de recordar, de sanar. Cada trazo se convirtió en un eco de aquellos días, en una conversación que continúa aún cuando él ya no está.
                    <br><br>
                    Influenciado por aquellos paisajes de mar y cielo que dibujaron mi infancia, mi obra ha evolucionado hacia una búsqueda más íntima. Pinto no lo que veo, sino lo que me atraviesa. El mar, recurrente en mis lienzos, no es solo un lugar, es un estado emocional: vasto, cambiante, a veces sereno y otras brutal.
                    <br><br>
                    Hoy, cuando expongo mi obra, no solo muestro cuadros: abro ventanas hacia un mundo artistico tejido entre oleos, viento salado y memorias en papel rugoso. Pintar, para mí, no es describir el mundo; es sumergirme en él hasta perderme, y volver con algo verdadero en las manos.
                </p>

            </div>
            <div class="marco">
                <img src="{{ asset('images/cuadro2.png') }}" alt="Galería de Juan Manuel">
            </div>
        </div>
    </section>
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
        const contadorDiv = document.querySelector('.contador-visitas');
        setTimeout(() => {
            contadorDiv.classList.add('visible');
        }, 500);
    


        const bloques = document.querySelectorAll(".seccion-oscura .bloque");
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("visible");
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.3
        });
        
        bloques.forEach(bloque => observer.observe(bloque));
    
        const hero = document.querySelector(".hero");
        setTimeout(() => {
            hero.classList.add("visible");
        }, 300);
    });
    
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
</script>


</body>
</html>
