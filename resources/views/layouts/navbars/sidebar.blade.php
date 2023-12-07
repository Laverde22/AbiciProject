<div class="sidebar" data-color="green"  data-image="{{ asset('img/sidebar-1.jpg')}}">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
  <img src="{{asset('img/abicinavideño.png')}}" alt="">
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="material-icons">home</i>
            <p>{{ __('INICIO') }}</p>
        </a>
      </li>
 
  @if(auth()->user()->hasRole('admin'))

  <li class="nav-item{{ $activePage == 'admin' ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.listadmins') }}">
      <i class="material-icons">key</i>
        <p>{{ __('Administradores') }} </p>
    </a>
  </li>

  <li class="nav-item{{ $activePage == 'personal' ? ' active' : '' }}">
    <a class="nav-link" href="{{ route('admin.listpersonal') }}">
      <i class="material-icons">store</i>
        <p>{{ __('Domiciliarios') }} </p>
    </a>
  </li>

  <li class="nav-item{{ $activePage == 'pedidos' ? ' active' : '' }}">
    <a class="nav-link" href="{{route('admin.listpedidos')}}">
      <i class="material-icons">shopping_cart</i>
        <p>{{ __('Pedidos') }}</p>
    </a>
  </li>
    <li class="nav-item{{ $activePage == 'clientes' ? ' active' : '' }}">
      <a class="nav-link" href="{{route('admin.listclientes')}}">
        <i class="material-icons">person</i>
          <p>{{ __('Usuarios') }}</p>
      </a>
    </li>

  </li>
  <li class="nav-item{{ $activePage == 'bici' ? ' active' : '' }}">
    <a class="nav-link" href="{{route('bicicletas.index')}}">
      <i class="material-icons">directions_bike</i>
        <p>{{ __('Bicicletas') }}</p>
    </a>
  </li>

    <li class="nav-item{{ $activePage == 'factura' ? ' active' : '' }}">
      <a class="nav-link" href="">
        <i class="material-icons">library_books</i>
        <p>{{ __('Facturas') }}</p>
      </a>
    </li>
  </ul>
@elseif(auth()->user()->hasRole('user'))

<li class="nav-item{{ $activePage == 'factura' ? ' active' : '' }}">
  <a class="nav-link " href="{{route('users.index')}}">
    <i class="material-icons">shopping_cart</i>
    <p>{{ __('Mis Pedidos') }}</p>
  </a>
</li>
<li class="nav-item{{ $activePage == 'ayuda' ? ' active' : '' }}">
  <a class="nav-link" href="{{route('users.ayuda')}}">
     <i class="material-icons">help</i>
     <p>{{ __('Ayuda') }}</p>
  </a>
</li>

@endif
@if(auth()->user()->hasRole('domi'))
<li class="nav-item{{ $activePage == 'domi' ? ' active' : '' }}">
  <a class="nav-link" href="{{route('domiciliario.index')}}">
    <i class="material-icons">shopping_cart</i>
    <p>{{ __('Mis Pedidos') }}</p>
  </a>
</li>
  <li class="nav-item{{ $activePage == 'factura' ? ' active' : '' }}">
  <a class="nav-link" href="{{route('facturas.index')}}">
    <i class="material-icons">library_books</i>
      <p>{{ __('Facturas') }}</p>
    </a>
  </li>
@endif
  </div>
</div>
