<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="{{ asset('faviconV2.png') }}">
    <style>
    </style>
</head>
<body>


<div class="divlog">

    <h1>Registro</h1>

    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">  <!-- added enctype for file upload -->
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre y apellidos:</label>  <!-- changed 'name' to 'nombre' -->
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required>  <!-- changed 'name' to 'nombre' -->
            @error('nombre') 
                <span style="color:red;">{{ $message }}</span> 
            @enderror
        </div>
    
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            @error('email') 
                <span style="color:red;">{{ $message }}</span> 
            @enderror
        </div>
    
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" required>
            @error('password') 
                <span style="color:red;">{{ $message }}</span> 
            @enderror
        </div>
    
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
    
        <div class="form-group">
            <label for="avatar">Seleccione tu avatar</label>
            <input type="file" name="avatar" id="avatar"> 
        </div>
    
        <button type="submit">Registrarme</button>
    </form>
    
    <p>¿Ya tienes una cuenta? 
       <a href="{{ route('login') }}">Inicia sesión aquí</a></p>

</div>



</body>
</html>