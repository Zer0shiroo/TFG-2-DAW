<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Juan Manuel | Arte y literatura</title>
    <link href="{{ asset('css/auth/register.css') }}" rel="stylesheet">

</head>
<body>


<div class="divlog">

    <h1>Iniciar sesión</h1>

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                value="{{ old('email') }}" 
                required 
                autofocus
                placeholder="Introduce tu correo electrónico"
            >
            @error('email')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

    
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                required 
                placeholder="Introduce tu contraseña"
            >
            @error('password')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

       
        <div class="form-group">
           <button type="submit">Iniciar sesión</button>
       </div>
    </form>
   
 
    <p>¿No tienes una cuenta? 
       <a href="{{ route('register') }}">Regístrate aquí</a></p>
    <p>¿Quieres entrar a ojear?
       <a href="{{ route('blog.index') }}">Entrar sin cuenta</a></p>

</div>

</body>
</html>
