<nav class="navbar">
  <div class="navbar-container">
    <div class="nav-left">
      <a href="/" class="logo">
        <img src="/logo.png" alt="Logo de MiSitio" class="logo-img">
      </a>
    </div>

    <div class="menu-toggle" id="menu-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <ul class="nav-links" id="nav-links">
      <li><a href="{{ route('blog.index') }}">Inicio</a></li>
      <li><a href="{{ route('cuadros') }}">Galería</a></li>
      <li class="menu-item-con-submenu">
        <a href="#autor">Literatura</a>
        <div class="submenu">
          <a href="{{ route('RelatoMicrorrelato') }}">Relato y Microrrelato</a>
          <a href="{{ route('poesia') }}">Poesía</a>
        </div>
      </li>
      <li><a href="{{ route('sobremi') }}">Sobre mí</a></li>
      <li><a href="{{ route('premios') }}">Premios</a></li>
      <li><a href="{{ route('contacto') }}">Contacto</a></li>
    </ul>

    <div class="usuario">
      @if(Auth::check())
        <span class="saludo">Bienvenido, {{ Auth::user()->nombre }}!</span>
        @if(Auth::user()->avatar)
          <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Avatar de {{ Auth::user()->name }}" onclick="toggleMenu()">
        @else
          <img src="{{ asset('images/default-avatar.jpg') }}" alt="Avatar por defecto" onclick="toggleMenu()">
        @endif

        <div id="menu-desplegable" class="menu-desplegable">
          <a href="{{ route('verPerfil') }}">👤 Ver perfil</a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="cerrarsesion">🚪 Cerrar sesión</button>
          </form>
        </div>
      @else
        <span class="saludo">Bienvenido, visitante 👋</span>
        <a href="{{ route('login') }}" class="boton-login">Iniciar sesión</a>
      @endif
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const toggleBtn = document.getElementById("menu-toggle");
      const navLinks = document.getElementById("nav-links");

      toggleBtn.addEventListener("click", function () {
        navLinks.classList.toggle("active");
      });
    });

    function toggleMenu() {
      const menu = document.getElementById("menu-desplegable");
      menu.classList.toggle("active");
    }

    document.addEventListener('click', function (e) {
      const menu = document.getElementById("menu-desplegable");
      const avatar = document.querySelector(".usuario img");
      if (!menu.contains(e.target) && !avatar.contains(e.target)) {
        menu.classList.remove("active");
      }
    });
</script>

</nav>
