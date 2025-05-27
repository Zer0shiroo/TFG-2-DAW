<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Usuario</title>
    <link href="{{ asset('css/blog/verperfil.css') }}" rel="stylesheet">

</head>
<body>


<div class="perfil-contenedor">

    <div class="perfil-caja">
        <a href="{{ route('blog.index')  }}" class="btnvolver">←Volver</a>

        <div class="avatar-section">
            <div class="avatar-wrapper" onmouseenter="mostrarLapizAvatar()" onmouseleave="ocultarLapizAvatar()">
                <img src="{{ asset(Auth::user()->avatar ? 'storage/' . Auth::user()->avatar : 'images/default-avatar.jpg') }}"
                     alt="Avatar de {{ Auth::user()->name }}" class="perfil-avatar">
                
                <form action="{{ route('perfil.actualizar.avatar') }}" method="POST" enctype="multipart/form-data" id="avatar-form">
                    @csrf
                    @method('PUT')
                    <label for="avatar-input" class="avatar-edit-icon" id="lapiz-avatar">✏️</label>
                    <input type="file" name="avatar" id="avatar-input" accept="image/*" onchange="document.getElementById('avatar-form').submit()" hidden>
                </form>
            </div>
        </div>
        

        <form action="{{ route('perfil.actualizar') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="editable-nombre" onmouseenter="mostrarIcono()" onmouseleave="ocultarIcono()">
                <input type="text" id="email" name="email" value="{{ Auth::user()->email }}" readonly class="nombre-input">
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="name" id="nombre" name="nombre" value="{{ Auth::user()->nombre }}" required>    
            </div>

            <div class="perfil-botones">
                <button type="submit" class="perfil-boton guardar">💾 Guardar</button>
                <a href="{{ route('logout') }}" class="perfil-boton cerrar">🚪 Cerrar sesión</a>
            </div>

        </form>
    </div>
</div>
<script>
    function habilitarEdicion() {
        const input = document.querySelector('.nombre-input');
        input.readOnly = false;
        input.focus();
    }

    function mostrarIcono() {
        document.getElementById('lapiz').style.opacity = 1;
    }

    function ocultarIcono() {
        document.getElementById('lapiz').style.opacity = 0;
    }
</script>
</body>
</html>
