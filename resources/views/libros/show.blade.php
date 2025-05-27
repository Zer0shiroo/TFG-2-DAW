<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $libro->titulo }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="{{ asset('css/libros/show.css') }}" rel="stylesheet">
</head>
<body>

    <main class="contenedor">
        @if($libro->portada)
            <img src="{{ asset('storage/' . $libro->portada) }}" alt="Portada del libro {{ $libro->titulo }}" class="imagen-libro">
        @endif

        <h1>{{ $libro->titulo }}</h1>

        <div class="detalle-libro">
            @if($libro->tipo)
                <p><strong>Tipo:</strong> {{ $libro->tipo }}</p>
            @endif

            @if($libro->anio_publicacion)
                <p><strong>Año de publicación:</strong> {{ $libro->anio_publicacion }}</p>
            @endif

            @if($libro->autor)
                <p><strong>Autor:</strong> {{ $libro->autor }}</p>
            @endif

            @if($libro->sinopsis)
                <p class="sinopsis"><strong>Sinopsis:</strong> {{ $libro->sinopsis }}</p>
            @endif
        </div>

        @if ($libro->tipo === 'Poesía')
            <a href="{{ route('libros.poesiaindex') }}" class="volver">⬅ Volver a la galería</a>
        @else
            <a href="{{ route('RelatoMicrorrelato') }}" class="volver">⬅ Volver a la galería</a>
        @endif



        <h2 class="titulo-comentarios">Comentarios</h2>

        @if(auth()->check())
            <form action="{{ route('comentario.libro.store', $libro->id) }}" method="POST" class="formulario-comentario">
                @csrf
                <textarea name="contenido" rows="3" placeholder="Escribe tu comentario..." required></textarea>
                <button type="submit">Enviar comentario</button>
            </form>
        @else
            <p class="mensaje-login"><a href="{{ route('login') }}">Inicia sesión</a> para comentar.</p>
        @endif
        
        <div class="lista-comentarios">
            @foreach($comentarios as $comentario)
                <div class="comentario-card">
                    <div class="comentario-header">
                        <strong>{{ $comentario->usuario->nombre }}</strong> comentó:
                    </div>
                    <div class="comentario-cuerpo">
                        <p>{{ $comentario->contenido }}</p>
                    </div>
                    <div class="comentario-footer">
                        <form method="POST" action="{{ route('comentario.like', $comentario->id) }}">
                            @csrf
                            <button type="submit" class="btn-like">
                                👍 {{ $comentario->likes->count() }}
                                @if($comentario->likes->contains(auth()->id()))
                                    <span class="me-gusta">(Te gusta)</span>
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
   
    
</body>
</html>
