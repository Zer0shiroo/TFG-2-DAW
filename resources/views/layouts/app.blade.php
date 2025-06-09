    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Mi Sitio')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        
        @include('partials.navbar')
  
        
        </body>
    </html>
    