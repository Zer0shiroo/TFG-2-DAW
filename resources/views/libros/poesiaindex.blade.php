<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poesia | Blog Juan Manuel Perez Torres</title>
    <link href="{{ asset('css/libros/RelatoMicrorrelato.css') }}" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')
    
    <h2>Poesía</h2>
    @if (Auth::check() && Auth::user()->admin)

    <a class="btn crear-btn" href="{{ route('libros.create') }}">Crear nueva poesía</a>
    @endif
    <form class="buscador" method="GET" action="{{ route('libros.poesiaindex') }}">
        <input type="text" name="buscar" placeholder="Buscar por título o autor..." value="{{ request('buscar') }}">
        <button type="submit">Buscar</button>
    </form>

    

    <div class="libros-list">
        @forelse($libros as $libro)
            <div class="libro">
                <img src="{{ asset('storage/' . $libro->portada) }}" alt="Imagen del libro">
                <h3>{{ $libro->titulo }}</h3>
                <p><strong>Tipo:</strong> {{ $libro->tipo }}</p>
                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
                <p><strong>Sinopsis:</strong> {{ Str::limit($libro->sinopsis, 100) }}</p>
                <a class="btn ver-mas" href="{{ route('libros.show', $libro->id) }}">Ver más</a>
                @if (Auth::check() && Auth::user()->admin)
                    <a class="btn editar-btn" href="{{ route('libros.edit', $libro) }}">✏️ Editar</a>
                @endif
            </div>
        @empty
            <p style="text-align: center;">No se encontraron resultados.</p>
        @endforelse
    </div>
</body>
</html>
