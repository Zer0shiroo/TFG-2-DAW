<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/cuadros/edit.css') }}" rel="stylesheet">
    <title>Editar Cuadro</title>
</head>
<body>

<div class="container">
    <h1>Editar Cuadro</h1>

    @if ($errors->any())
        <div class="alerta-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="form-cuadro" action="{{ route('cuadros.update', $cuadro) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="{{ old('titulo', $cuadro->titulo) }}" required>

        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name="descripcion" rows="5">{{ old('descripcion', $cuadro->descripcion) }}</textarea>

        <label for="anio_creacion">Año de Creación</label>
        <input type="number" id="anio_creacion" name="anio_creacion" value="{{ old('anio_creacion', $cuadro->anio_creacion) }}" required>

        <label for="tecnica">Técnica</label>
        <input type="text" id="tecnica" name="tecnica" value="{{ old('tecnica', $cuadro->tecnica) }}">

        <label for="dimensiones">Dimensiones</label>
        <input type="text" id="dimensiones" name="dimensiones" value="{{ old('dimensiones', $cuadro->dimensiones) }}">

        <label for="estilo">Estilo</label>
        <input type="text" id="estilo" name="estilo" value="{{ old('estilo', $cuadro->estilo) }}">

        <label for="imagen">Cambiar imagen (opcional)</label>
        <input type="file" id="imagen" name="imagen">
        
        @if($cuadro->imagen)
            <p>Imagen actual:</p>
            <img src="{{ asset('storage/' . $cuadro->imagen) }}" style="max-width: 200px;">
        @endif

        <div class="botones">
            <button type="submit">💾 Actualizar Cuadro</button>
            <a href="{{ route('cuadros') }}" class="volver-btn">← Volver</a>
        </div>
    </form>

    <form id="form-eliminar" action="{{ route('cuadros.destroy', $cuadro) }}" method="POST" onsubmit="return confirmarEliminacion();" style="margin-top: 1rem;">
        @csrf
        @method('DELETE')
        <button type="submit" class="eliminar-btn">🗑️ Eliminar Cuadro</button>
    </form>
</div>

<script>
    function confirmarEliminacion() {
        return confirm("¿Estás seguro de que deseas eliminar este cuadro? Esta acción no se puede deshacer.");
    }
</script>

</body>
</html>
