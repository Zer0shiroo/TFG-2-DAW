<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/cuadros/index.css') }}" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galería de cuadros | Blog Juan Manuel Perez Torres</title>
</head><body>

    @extends('layouts.app')
      
    
    <h2>Galería de Cuadros</h2>
   
        @if (Auth::check() && Auth::user()->admin)
        <a class="acuadro"  href="{{ route('cuadros.create') }}">Crear nuevo cuadro</a>
        @endif

    <form class="buscador" method="GET" action="{{ route('cuadros') }}">
        <input type="text" name="buscar" placeholder="Buscar por título..." value="{{ request('buscar') }}">
        <button type="submit">Buscar</button>
    </form>

    <div class="cuadros-list">
        @foreach($cuadros as $cuadro)
        <div class="cuadro">
            
            <img src="{{ asset('storage/' . $cuadro->imagen) }}" alt="Imagen del cuadro">


            <div class="cuadro-contenido">
                <h3>{{ $cuadro->titulo }}</h3>
                <p>{{ Str::limit($cuadro->descripcion, 100) }}</p>
            </div>
            
            <div class="cuadro-footer">
                <a href="{{ route('cuadros.show', $cuadro) }}" class="ver-mas"> Ver más</a>
                @if (Auth::check() && Auth::user()->admin)
                <a href="{{ route('cuadros.edit', $cuadro) }}" class="editar-btn">✏️ Editar</a>
                @endif

            </div>
        </div>
        
        @endforeach
    </div>
    <script>
        function toggleMenu() {
            const menu = document.getElementById("menu-desplegable");
            if (menu) {
                menu.classList.toggle("active");
            }
        }
    </script>
    
</body>
</html>