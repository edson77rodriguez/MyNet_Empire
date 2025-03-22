<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            margin: 0;
            overflow: hidden; /* Evita barras de desplazamiento */
            font-family: 'Arial', sans-serif;
            color: #fff;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #background-video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            transform: translateX(-50%) translateY(-50%);
            background-size: cover;
        }

        .container {
            text-align: center;
        }

        .logo h1 {
            font-size: 4rem; /* Tamaño grande para destacar */
            font-weight: bold;
            text-transform: uppercase; /* Texto en mayúsculas */
            color: #ffffff; /* Color blanco puro */
            background: linear-gradient(90deg, #ff416c, #ff4b2b); /* Gradiente moderno */
            -webkit-background-clip: text; 
            -webkit-text-fill-color: transparent; /* Hace que el texto sea transparente con gradiente */
            margin-bottom: 1rem;
            animation: glow 2s infinite alternate; /* Efecto de brillo animado */
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px #ff416c, 0 0 20px #ff4b2b, 0 0 30px #ff4b2b, 0 0 40px #ff416c;
            }
            to {
                text-shadow: 0 0 20px #ff416c, 0 0 30px #ff4b2b, 0 0 40px #ff4b2b, 0 0 50px #ff416c;
            }
        }

        .subtitle {
            font-size: 1.5rem; /* Tamaño más grande para destacar */
            color: rgba(255,255,255,0.8); /* Blanco con opacidad */
            margin-bottom: 2rem;
        }

        .button {
            padding: 0.75rem 1.5rem;
            border-radius: 50px; /* Bordes redondeados */
            font-weight: bold;
            margin: 0.5rem;
            display: inline-block;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .button-primary {
            background-color: rgba(255,65,108,1); /* Color rosa vibrante */
            color: white;
        }

        .button-secondary {
            background-color: rgba(108,117,125,1); /* Gris oscuro */
        }

        .button:hover {
            transform: scale(1.1); /* Aumenta ligeramente el tamaño */
        }
    </style>
</head>
<body>

    <!-- Video de fondo -->
    <video autoplay loop muted id="background-video">
        <source src="{{ asset('Videos/inicio.mp4') }}" type="video/mp4">
    </video>

    <!-- Contenido principal -->
    <div class="container animate__animated animate__fadeIn">
        
        <!-- Título estilizado -->
        <div class="logo">
          <h1>MyNet Empire</h1>
        </div>

        <!-- Subtítulo -->
        <div class="subtitle">
           ¡Bienvenido a nuestra plataforma!
        </div>

        <!-- Botones -->
        <div>
           <a href="{{ route('login') }}" class="button button-primary">Iniciar Sesión</a>
           <a href="{{ route('register') }}" class="button button-secondary">Registrarse</a>
       </div>

    </div>

</body>
</html>
