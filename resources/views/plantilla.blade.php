<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
        <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

        <link rel="stylesheet" href="css/index.css">

        <title>ABICI</title>
    </head>

    <body >
       
        @include('navegacion.nav')
        @yield('contenido')
        <script src="{{ asset('js/index.js') }}"></script>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Contacto</h4>
                        <p>Números de Teléfono:</p>
                        <ul>
                            <li><i class="fi fi-sr-phone-call"></i> +57-321-486-4983</li>
                            <li><i class="fi fi-sr-phone-call"></i> +57-321-486-4983</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Síguenos en Redes Sociales</h4>
                        <ul class="social-icons">
                            <li><a class="bton text-decoration-none w-50 m-3" href="https://www.facebook.com/search/top?q=abici" target="_blank"><i class="fi fi-brands-facebook"></i> Abici</i></a></li>
                            <li><a class="bton text-decoration-none w-50" href="https://www.instagram.com/abici_mensajeria/" target="_blank"><i class="fi fi-brands-instagram"></i> Abici</a></li>
                            <!-- Agrega más íconos de redes sociales según sea necesario -->
                        </ul>
                    </div>
                </div>
            </div>
            <p>&copy; 2023 Abici Domicilios. Todos los derechos reservados.</p>
        </footer>
       
    </body>
</html>
