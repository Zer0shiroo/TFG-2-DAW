<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo libro | Blog Juan Manuel Perez Torres</title>
    <link href="{{ asset('css/libros/create.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1> Crear nuevo libro</h1>

        @if ($errors->any())
            <div class="alerta-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>

            <label for="autor">Autor</label>
            <input type="text" id="autor" name="autor" value="{{ old('autor') }}" required>

            <label for="anio_publicacion">Año de Publicación</label>
            <input type="number" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion') }}" required>

            <label for="sinopsis">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" rows="5" required>{{ old('sinopsis') }}</textarea>

            <label for="portada">Portada</label>
            <input type="file" id="portada" name="portada" required>

            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" required>
                <option value="">Selecciona un tipo</option>
                <option value="Relato">Relato</option>
                <option value="Microrrelato">Microrrelato</option>
                <option value="Poesía">Poesía</option>
            </select>
            
            <div class="botones">
                <button type="submit">💾 Guardar Libro</button>
                <a href="{{ route('RelatoMicrorrelato') }}" class="volver-btn">← Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
