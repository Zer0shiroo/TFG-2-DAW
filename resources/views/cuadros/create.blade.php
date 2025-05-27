<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear nuevo cuadro</title>
    <link href="{{ asset('css/cuadros/create.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1> Crear nuevo cuadro</h1>

        @if ($errors->any())
            <div class="alerta-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cuadros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>

            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="5" required>{{ old('descripcion') }}</textarea>

           
            <label for="imagen">Imagen</label>
            <input type="file" id="imagen" name="imagen" required>

            <label for="anio_creacion">Año de Creación</label>
            <input type="number" id="anio_creacion" name="anio_creacion" value="{{ old('anio_creacion') }}" required>
            
            <label for="tecnica">Técnica</label>
            <input type="text" id="tecnica" name="tecnica" value="{{ old('tecnica') }}">
            
            <label for="dimensiones">Dimensiones</label>
            <input type="text" id="dimensiones" name="dimensiones" value="{{ old('dimensiones') }}">
            
            <label for="estilo">Estilo</label>
            <input type="text" id="estilo" name="estilo" value="{{ old('estilo') }}">




            <div class="botones">
                <button type="submit">💾 Guardar Cuadro</button>
                <a href="{{ route('cuadros') }}" class="volver-btn">← Volver</a>
            </div>
           

        </form>
    </div>
</body>
</html>
