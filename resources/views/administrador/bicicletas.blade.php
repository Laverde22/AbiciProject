@extends('layouts.main', ['activePage' => 'bici', 'titlePage' => __('BICICLETAS')])
<link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <h2>Listado De Todas Las Bicicletas</h2>
                <button type="button" class="btn btn-primary" id="crearPedidoBtn" data-toggle="modal" data-target="#crearPedidoModal">
                    Crea Bicicleta
                  </button>
                @if($usuarios->isEmpty())
                <p>No hay Bicicletas que cumplan estas caracteristicas</p>
            @else

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bicicletas.index') }}">
                            {{ __('Bicicletas') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bicicletas.sin-domiciliario') }}">
                        {{ __('Sin Domiciliario') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Tipo de Bicicleta</th>
                        <th>Domiciliario Responsable</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $cliente)
                    <tr>
                        <td>{{ $cliente->tipo }}</td>
                        <td>{{ $cliente->fullname }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->direccion }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-ver-mas" data-toggle="modal" data-target="#modalCliente">Ver Más</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            

                    @foreach($usuarios as $cliente)   <!-- Modal para cada cliente -->
                        <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteLabel" aria-hidden="true" data-backdrop="static" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalClienteLabel">Detalles de Bicicleta Tipo {{ $cliente->tipo }}  </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Mostrar aquí los detalles del cliente -->
                                        <p><strong>Propietario:</strong>{{ $cliente->propietario }}</p>
                                        <p><strong>Domiciliario Responsable:</strong>{{ $cliente->fullname }}</p>
                                        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                                        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                                        <p><strong>Correo:</strong> {{ $cliente->email }}</p>
                                        <p ><strong>Fecha De Nacimiento:</strong> {{ $cliente->fechaNacimiento }}</p>
                                        <p><strong>{{ $cliente->tipoDocumento }}:</strong> {{ $cliente->numDocumento }}</p>
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarRolModal">Editar Rol</button> --}}
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                   
                                       <!-- Modal para editar rol -->
                                    <div class="modal fade" id="editarRolModal" tabindex="-1" role="dialog" aria-labelledby="editarRolModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editarRolModalLabel">Editar Rol de</h5>
                                                </div>
                                                <form action="" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <!-- Selección del nuevo rol -->
                                                        <label for="selectRol">Seleccionar Rol:</label>
                                                        <select class="form-control" id="selectRol" name="rol">
                                                            <option value="user">Usuario</option>
                                                            <option value="domi">Domiciliario</option>
                                                            <!-- Agrega las opciones correspondientes a los roles disponibles -->
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- Agrega aquí el botón para guardar el nuevo rol -->
                                                        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
                                                        <button type="button" class="btn btn-primary" onclick="location.reload();">Cerrar</button>                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
 
@endsection
