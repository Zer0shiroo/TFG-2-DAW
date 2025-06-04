<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro | Blog Juan Manuel Perez Torres</title>
    <link href="{{ asset('css/libros/edit.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Editar Libro</h1>

    @if ($errors->any())
        <div class="alerta-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.update', $libro) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required>

        <label for="autor">Autor</label>
        <input type="text" id="autor" name="autor" value="{{ old('autor', $libro->autor) }}" required>

        <label for="anio_publicacion">Año de Publicación</label>
        <input type="number" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion', $libro->anio_publicacion) }}" required>

        <label for="sinopsis">Sinopsis</label>
        <textarea id="sinopsis" name="sinopsis" rows="5" required>{{ old('sinopsis', $libro->sinopsis) }}</textarea>

        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo" required>
            <option value="">Selecciona un tipo</option>
            <option value="Relato" {{ old('tipo', $libro->tipo) === 'Relato' ? 'selected' : '' }}>Relato</option>
            <option value="Microrrelato" {{ old('tipo', $libro->tipo) === 'Microrrelato' ? 'selected' : '' }}>Microrrelato</option>
            <option value="Poesía" {{ old('tipo', $libro->tipo) === 'Poesía' ? 'selected' : '' }}>Poesía</option>
        </select>

        <label for="portada">Cambiar portada (opcional)</label>
        <input type="file" id="portada" name="portada">

        @if($libro->portada)
            <p>Portada actual:</p>
            <img src="{{ asset('storage/' . $libro->portada) }}" style="max-width: 200px;">
        @endif

        <div class="botones">
            <button type="submit">💾 Actualizar Libro</button>
            <a href="{{ route('RelatoMicrorrelato') }}" class="volver-btn">← Volver</a>
        </div>
    </form>

    <form action="{{ route('libros.destroy', $libro) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este libro?')" style="margin-top: 1rem;">
        @csrf
        @method('DELETE')
        <button type="submit" class="eliminar-btn">🗑️ Eliminar Libro</button>
    </form>
</div>
</body>
</html>
