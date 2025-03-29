<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MyNet Empire') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .navbar-nav {
            gap: 1.5rem;
        }

        .nav-item {
            transition: transform 0.3s ease;
        }

        .nav-item:hover {
            transform: translateY(-2px);
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background 0.3s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .nav-link.active {
            background: rgba(255,255,255,0.2);
        }

        .content {
            padding: 2rem;
            flex-grow: 1;
            background: #f8f9fa;
        }

        .footer {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            color: white;
            text-align: center;
            padding: 1rem;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-globe2"></i>
                MyNet Empire
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('router.config') }}">
                            <i class="bi bi-gear"></i>
                            Sistema
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="content">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <span>&copy; 2025 MyNet Empire</span>
                <a href="#" class="text-decoration-none text-white">
                    <i class="bi bi-github"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
