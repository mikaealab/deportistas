<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Makaan - Deportistas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('real/img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBF-pqS3WBYs8eap_ykcP7BtlNX2kU2kvU&callback=initMap"></script>

    <!-- Icon Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Vendor CSS -->
    <link href="{{ asset('real/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('real/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('real/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('real/css/style.css') }}" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <!-- Bootstrap FileInput -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/css/fileinput.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/locales/es.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    @stack('styles')
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <!-- Spinner -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <!-- Navbar -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="{{ asset('real/img/icon-deal.png') }}" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">DEPORTISTAS</h1>
                </a>

                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('paises.index') }}" class="nav-item nav-link">Paises</a>
                        <a href="{{ route('disciplina.index') }}" class="nav-item nav-link">Disciplinas</a>
                        <a href="{{ route('deportista.index') }}" class="nav-item nav-link">Deportistas</a>
                    </div>
                </div>
            </nav>
        </div>

        <!-- Contenido -->
        <div class="container my-5">
            @yield('Contenido')
        </div>

        <!-- Footer -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="row g-5">

                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contacto</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>Quito, Ecuador</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+593 987654321</p>
                        <p><i class="fa fa-envelope me-3"></i>info@makaan.com</p>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Enlaces</h5>
                        <a class="btn btn-link text-white-50" href="#">Nosotros</a>
                        <a class="btn btn-link text-white-50" href="#">Servicios</a>
                        <a class="btn btn-link text-white-50" href="#">Políticas</a>
                        <a class="btn btn-link text-white-50" href="#">Términos</a>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <h5 class="text-white mb-4">Boletín</h5>
                        <input class="form-control bg-transparent text-white w-100 py-3 ps-4 pe-5" placeholder="Tu correo">
                    </div>

                </div>
            </div>
        </div>

        <!-- Botón subir -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
            <i class="bi bi-arrow-up"></i>
        </a>

    </div>

    <!-- ▼ LIBRERÍAS JS ▼ -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables + Buttons -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>

    <!-- Exportación -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- JS de tu plantilla -->
    <script src="{{ asset('real/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('real/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('real/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('real/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('real/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
