<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $cuadro->titulo }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="{{ asset('css/cuadros/show.css') }}" rel="stylesheet">
</head>
<body>


    <main class="contenedor">
        <h1>{{ $cuadro->titulo }}</h1>

        @if($cuadro->imagen)
            <img src="{{ asset('storage/' . $cuadro->imagen) }}" alt="Imagen del cuadro {{ $cuadro->titulo }}" class="imagen-cuadro">
        @endif

        @if($cuadro->descripcion)
            <p class="descripcion">{{ $cuadro->descripcion }}</p>
        @endif

        <div class="detalle-cuadro">
            @if($cuadro->anio_creacion)
                <p><strong>Año de creación:</strong> {{ $cuadro->anio_creacion }}</p>
            @endif

            @if($cuadro->tecnica)
                <p><strong>Técnica:</strong> {{ $cuadro->tecnica }}</p>
            @endif

            @if($cuadro->dimensiones)
                <p><strong>Dimensiones:</strong> {{ $cuadro->dimensiones }}</p>
            @endif

            @if($cuadro->estilo)
                <p><strong>Estilo:</strong> {{ $cuadro->estilo }}</p>
            @endif
        </div>

        <a href="{{ route('cuadros') }}" class="volver">⬅ Volver a la galería</a>
        <h2 class="titulo-comentarios">Comentarios</h2>

@if(auth()->check())
    <form action="{{ route('comentario.store', $cuadro->id) }}" method="POST" class="formulario-comentario">
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
                    @if(!auth()->check())
                    <button type="submit" class="btn-like" disabled>
                    👍 {{ $comentario->likes->count() }}
                    </button>
                    @else
                    <button type="submit" class="btn-like">
                        👍 {{ $comentario->likes->count() }}
                        @if($comentario->likes->contains(auth()->id()))
                            <span class="me-gusta">(Te gusta)</span>                    </button>

                        @endif
                        @endif
                </form>
            </div>
        </div>
    @endforeach
</div>

    </main>

</body>
</html>
