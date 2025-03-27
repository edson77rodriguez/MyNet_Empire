<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MyNet Empire') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
       body {
    display: flex;
    flex-direction: row; /* Modificado para colocar los elementos uno al lado del otro */
    min-height: 100vh;
}

.sidebar {
    height: 100vh; /* Asegura que la barra lateral ocupe toda la altura */
    position: fixed;
    width: 250px; /* Fija el tamaño de la barra lateral */
    top: 0;
    left: 0;
    z-index: 1000;
}

.content {
    margin-left: 250px; /* Asegura que el contenido no se superponga a la barra lateral */
    padding: 20px;
    width: calc(100% - 250px); /* Ajuste automático del contenido */
    flex-grow: 1;
}

.footer {
    background-color: #343a40;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body class="bg-dark">
    <nav class="navbar navbar-dark bg-secondary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyNet Empire</a>
        </div>
    </nav>
    
    <div class="d-flex"> <!-- Flexbox para mantener la barra lateral y el contenido juntos -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-secondary sidebar">
            <div class="position-sticky pt-5">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('router.config') }}">
                            Sistema
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content bg-dark text-white p-4">
            @yield('content')
        </main>
    </div>

    <footer class="footer">
        &copy; 2025 MyNet Empire - Todos los derechos reservados
    </footer>
</body>

</html>
