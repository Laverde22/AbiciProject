<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <h1 class="navbar-brand" href="#" style="font-size: 30px"></h1>
       
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <form class="navbar-form">
        <div class="input-group no-border">
        <input type="text" value="" class="form-control" placeholder="Buscar...">
        <button type="submit" class="btn btn-white btn-round btn-just-icon">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
        </div>
      </form>
      <ul class="navbar-nav">
       
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              @php
                  $userName = auth()->user()->name; // Obtiene el nombre del usuario logueado
                  $initials = preg_replace("/[^A-Za-z0-9]/", '', ucwords(strtolower($userName)));
                  $userInitials = substr($initials, 0, 2); // Obtener las dos primeras letras del nombre
              @endphp
              {{ $userInitials }}
          </a>

          <!-- Opciones del dropdown -->
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <!-- Otras opciones del dropdown -->
              <a class="dropdown-item" href="">{{ __('Settings') }}</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>
      </ul>
    </div>
  </div>
</nav>
