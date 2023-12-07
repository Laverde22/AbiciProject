
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/navegacion.css')}}">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-thin-straight/css/uicons-thin-straight.css'>

    <title>nav</title>
</head>
@yield('nav')
<body>
    <div class="contenedor-nav">
        <nav class="nav-bar sticky">
            <div class="nav-left">
                <p><i class="fi fi-br-biking-mountain"></i> ABICI</p>
            </div>
            <div class="nav-right">
                @if (Route::has('login'))
                    <div class="login">
                        @auth
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Iniciar Sesion</a>
    
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            
        </nav>
    </div>
</body>
</html>
