<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/blog/contacto.css') }}" rel="stylesheet">

</head>
<body>
    @extends('layouts.app')

    <div class="hero">

        <main class="seccion-contacto">
            <div class="contacto-contenido">
                <div class="contacto-texto">
                    <h2>📬 Ponte en contacto</h2>
                    <p><i class="fas fa-envelope"></i> <strong>Email:</strong> juma-peto@hotmail.com</p>
                    <p><i class="fas fa-phone"></i> <strong>Teléfono:</strong> +34 600 123 456</p>
                    <p><i class="fas fa-instagram"></i> <strong>Instagram:</strong> <a href="https://www.instagram.com/juanmanuel.pereztorres.1" target="_blank">@juanmanuel.pereztorres.1</a></p>
                    <p><i class="fas fa-facebook"></i> <strong>Facebook:</strong> <a href="https://www.facebook.com/juanmanuel.pereztorres.1/" target="_blank">Juan Manuel Pérez Torres</a></p>
                    <p><i class="fas fa-map-marker-alt"></i> <strong>Ubicación:</strong> Málaga, España</p>
                    <p><i class="fas fa-palette"></i> Si tienes dudas o simplemente compartir tu opinión, estaré encantado de escucharte.</p>
                    
                </div>

                <div class="contacto-imagen">
                    <img src="{{ asset('images/imgcontacto.jpg') }}" alt="Obra artística de Juan Manuel">
                </div>
            </div>
        </main>

        
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
