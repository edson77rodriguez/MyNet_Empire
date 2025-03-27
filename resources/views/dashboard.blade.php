<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Home | Mantis Bootstrap 5 Admin Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('/images/favicon.svg') }}" type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('/fonts/tabler-icons.min.css') }}" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('/fonts/feather.css') }}" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('/fonts/fontawesome.css') }}" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('/fonts/material.css') }}" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('/css/style.css') }}" id="main-style-link" >
<link rel="stylesheet" href="{{ asset('/css/style-preset.css') }}" >

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="{{ asset('/dashboard/index.html') }}" class="b-brand text-primary">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{ asset('/images/logo-dark.svg') }}" class="img-fluid logo-lg" alt="logo">
      </a>
    </div>
    <div class="navbar-content">
      <ul class="pc-navbar">
        <li class="pc-item">
          <a href="" class="pc-link">
            <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
            <span class="pc-mtext">Dashboard</span>
          </a>
        </li>

        <li class="pc-item pc-caption">
          <label>UI Components</label>
          <i class="ti ti-dashboard"></i>
        </li>
        <li class="pc-item pc-hasmenu">
    <a href="javascript:void(0);" class="pc-link toggle-submenu">
        <span class="pc-micon"><i class="ti ti-typography"></i></span>
        <span class="pc-mtext">Sistema</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>

    </a>
    <ul class="pc-submenu d-none">
        <li class="pc-item">
        <a href="javascript:void(0);" class="pc-link toggle-submenu">
        <span class="pc-micon"><i class="ti ti-typography"></i></span>
        <span class="pc-mtext">Sistema</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>

    </a>
            <ul class="pc-submenu d-none">
        <li class="pc-item">
            <a href="{{ route('router.config') }}" class="pc-link">Configuracion general</a>
        </li>
        <li class="pc-item">
            <a href="{{ route('system.log.settings') }}" class="pc-link">Inicio de sesion</a>
        </li>
        <li class="pc-item">
            <a href="{{ route('system.time.settings') }}" class="pc-link">Sincronizacion horaria</a>
        </li>
        <li class="pc-item">
            <a href="{{ route('system.language.style') }}" class="pc-link">Idioma y Estilo</a>
        </li>


    </ul>
        </li>
        <li class="pc-item">
            <a href="{{route('admin.password')}}" class="pc-link">Administración</a>
        </li>
        <li class="pc-item">
            <a href="{{route('admin.startup')}}" class="pc-link">Arranque</a>
        </li>
        <li class="pc-item">
            <a href="{{route('admin.tareas')}}" class="pc-link">Tareas Programadas</a>
        </li>
        <li class="pc-item">
            <a href="{{route('admin.conf')}}" class="pc-link">Configuracion de LEDs</a>
        </li>
        <li class="pc-item">
            <a href="{{route('admin.grab')}} " class="pc-link">Copia de seguridad/ Grabar firma</a>
        </li>
        <li class="pc-item">
            <a href="" class="pc-link">Reiniciar</a>
        </li>

    </ul>
</li>


    </div>
  </div>

</nav>

<!-- [ Sidebar Menu ] end /////////////////////////////////////////////////////////////////////////--> <!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <i data-feather="search"></i>
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
          </div>
        </form>
      </div>
    </li>
    <li class="pc-h-item d-none d-md-inline-flex">
      <form class="header-search">
        <i data-feather="search" class="icon-search"></i>
        <input type="search" class="form-control" placeholder="Search here. . .">
      </form>
    </li>
  </ul>
</div>
<!-- ////////////////////////////////////////////////////////////////// -->

</header>




  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <div class="page-header-title">
              </div>
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                <li class="breadcrumb-item" aria-current="page">Home</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <main class="content bg-dark text-white p-4">
            @yield('content')
        </main>
  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col-sm my-1">
          <p class="m-0"
            >HECHO POR EDSON PAPA <a href="https://themeforest.net/user/codedthemes" target="_blank">Codedthemes</a> Distributed by <a href="https://themewagon.com/">ThemeWagon</a>.</p
          >
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- [Page Specific JS] start -->
  <script src="{{ asset('/js/plugins/apexcharts.min.js') }}"></script>
  <script src="{{ asset('/js/pages/dashboard-default.js') }}"></script>
  <!-- [Page Specific JS] end -->
  <!-- Required Js -->
  <script src="{{ asset('/js/plugins/popper.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/simplebar.min.js') }}"></script>
  <script src="{{ asset('/js/plugins/bootstrap.min.js') }}"></script>
  <script src="{{ asset('/js/fonts/custom-font.js') }}"></script>
  <script src="{{ asset('/js/pcoded.js') }}"></script>
  <script src="{{ asset('/js/feather.min.js') }}"></script>





  <script>layout_change('light');</script>




  <script>change_box_container('false');</script>



  <script>layout_rtl_change('false');</script>


  <script>preset_change("preset-1");</script>


  <script>font_change("Public-Sans");</script>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-submenu").forEach(function (menu) {
        menu.addEventListener("click", function (e) {
            e.preventDefault(); // Evita que siga el enlace
            let submenu = this.nextElementSibling;

            // Alternar clases para mostrar/ocultar
            submenu.classList.toggle("d-none"); // Bootstrap: "d-none" oculta el submenú
            submenu.classList.toggle("d-block"); // "d-block" lo muestra
        });
    });
});
</script>



</body>
<!-- [Body] end -->

</html>
