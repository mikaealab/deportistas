<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Correo</title>
    <!-- Importando jquery validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" ></script>
    <!-- Importando SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Importando archivos js de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importar css de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importando iconos de font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- jQuery y jQuery Validation -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            text-align: center;
        }
        
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="card-title text-center mb-4">Verificación de Correo</h2>


        <p class="text-center text-muted mb-4">Por favor, ingresa el código de verificación que se ha enviado a tu correo electrónico.</p>
        
        <form method="POST" action="{{ route('verify.process') }}">
            @csrf
            <div class="mb-3">
                <label for="verification_code" class="card-title text-center mb-4">Código de verificación</label>
                <input type="text" class="form-control" id="verification_code" name="verification_code" >
            </div>
            <button type="submit" id="verificar" class="btn btn-primary btn-lg w-100">Verificar</button>
        </form>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
            $("form").each(function () {
                $(this).validate({
                    errorClass: 'text-danger',
                    errorElement: 'div',
                    rules: {
                        
                        verification_code: {
                            required: true,
                            digits: true,
                            minlength: 6,
                            maxlength: 6
                        }
                    },
                    messages: {
                        verification_code: {
                            required: "El código es obligatorio.",
                            digits: "Solo números.",
                            minlength: "Debe tener 6 dígitos.",
                            maxlength: "Debe tener 6 dígitos."
                        }
                    }
                });
            });
        });
</script>
<script>
    $(document).ready(function () {
        $('#verificar').on('click', function (e) {
            e.preventDefault();

            const form = $(this).closest('form'); // captura el formulario

            Swal.fire({
                title: "Verificando...",
                text: "Por favor espera",
                showClass: {
                    popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                    `
                },
                hideClass: {
                    popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster
                    `
                }
            }).then(() => {
                form.submit(); // envía el formulario al cerrar el SweetAlert
            });
        });
    });
</script>

<script>
$(document).ready(function () {
    // SweetAlert para mensajes
    @if(session('error'))
        Swal.fire({
            title: 'Error',
            text: '{{ session('error') }}',
            icon: 'error',
            confirmButtonColor: '#3085d6'
        });
    @endif

    @if(session('success'))
        Swal.fire({
            title: '¡Éxito!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6'
        });
    @endif

    @if(session('info'))
        Swal.fire({
            title: 'Información',
            text: '{{ session('info') }}',
            icon: 'info',
            confirmButtonColor: '#3085d6'
        });
    @endif

    @if(session('message'))
        Swal.fire({
            title: 'Confirmación',
            text: '{{ session('message') }}',
            icon: 'success',
            confirmButtonColor: '#3085d6'
        });
    @endif
});
</script>
