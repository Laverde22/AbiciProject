@extends('layouts.main', ['activePage' => 'bici', 'titlePage' => __('BICICLETAS')])
<link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <h2>Listado de Bicicletas</h2>
                @if($usuarios->isEmpty())
                <p>No hay clientes que cumplan estas caracteristicas</p>
            @else
            {{-- <form action="{{ route('admin.searchcli') }}" method="GET" class="mb-4">
                <div class="form-group">
                    <label for="selectCriterio">Seleccionar método de búsqueda:</label>
                    <select name="criterio" id="selectCriterio" class="form-control" autofocus>
                        <option value="numDocumento">Número de Documento</option>
                        <option value="tipoDocumento">Tipo de Documento</option>
                        <option value="direccion">Dirección</option>
                        <option value="telefono">Telefono</option>
                        <option value="estado">Estado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" id="valor" class="form-control" placeholder="Ingrese el valor de búsqueda ">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form> --}}
            
            
                <div class="row">
                    @foreach($usuarios as $cliente)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"> Bicicleta Tipo {{ $cliente->tipo }}</h4>
                                    <p class="card-text">Domiciliario Responsable: {{ $cliente->fullname }}</p>
                                    <p class="card-text">Telefono: {{ $cliente->telefono }}</p>
                                    <p class="card-text">Direccion: {{ $cliente->direccion }}</p>
                                    <p class="card-text">Correo: {{ $cliente->email }}</p>
                                    <a href="#" class="btn btn-primary btn-ver-mas" data-toggle="modal" data-target="#modalCliente">Ver Más</a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para cada cliente -->
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
    </div>
@endsection
