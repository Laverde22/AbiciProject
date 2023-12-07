@extends('layouts.main', ['activePage' => 'personal', 'titlePage' => __('Personal')])
<link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado de Personal</h2>
            <a href="#" class="btn btn-primary btn-ver-mas" data-toggle="modal" data-target="#registrarDomi">Registrar domiciliario</a>
            @if($rol->isEmpty())
                <p>No hay clientes que cumplan estas caracteristicas</p>
            @else
            <form action="{{ route('admin.searchcli') }}" method="GET" class="mb-4">
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
            </form>
            
            
                <div class="row">
                    
                        <div class="col-md-4 mb-4">
                            <div class="">
                                <div> 
                                    <table class="table table-hover">
                                         <tr>
                                             <td><h3>Nombre</h3></td>
                                             <td><h3>Telefono</h3></td>
                                             <td><h3>Direccion</h3></td>
                                             <td><h3>Email</h3></td>
                                             <td></td>
                                         </tr>
                                         @foreach($rol as $cliente)
                                         <tr>
                                             <td style="white-space: nowrap;"><h4>{{$cliente->name . ' ' . $cliente->apellidos}}</h4></td>
                                             <td><h4>{{$cliente->telefono }}</h4></td>
                                             <td style="white-space: nowrap;"><h4>{{$cliente->direccion}}</h4></td>
                                             <td><h4>{{$cliente->email}}</h4></td>
                                             <td><a href="#" class="btn btn-primary btn-ver-mas" data-toggle="modal" data-target="#modalCliente{{ $cliente->id }}">Ver Más</a></td>
                                         </tr>
                                         @endforeach
                                       </table>
                                 </div>
                            </div>
                        </div>
                        @foreach($rol as $cliente)
                        <!-- Modal para cada cliente -->
                        <div class="modal fade" id="modalCliente{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="modalCliente{{ $cliente->id }}Label" aria-hidden="true" data-backdrop="static" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCliente{{ $cliente->id }}Label">Detalles de  {{ $cliente->name. ' '. $cliente->apellidos}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Mostrar aquí los detalles del cliente -->
                                        <p><strong>Nombre:</strong>{{ $cliente->name. ' '. $cliente->apellidos}}</p>
                                        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                                        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                                        <p><strong>Correo:</strong> {{ $cliente->email }}</p>
                                        <p ><strong>Fecha De Nacimineto:</strong> {{ $cliente->fechaNacimiento }}</p>
                                        <p><strong>{{ $cliente->tipoDocumento }}:</strong> {{ $cliente->numDocumento }}</p>
                                        
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarRolModal{{ $cliente->id }}">Editar Estado</button> --}}
                                        <p ><strong>Fecha De Nacimineto:</strong> {{ $cliente->fechaNacimiento }}</p>
                                        <p><strong>{{ $cliente->tipoDocumento }}:</strong> {{ $cliente->numDocumento }}</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarRolModal{{ $cliente->id }}">Editar Rol</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                   
                                       <!-- Modal para editar rol -->
                                    <div class="modal fade" id="editarRolModal{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="editarRolModal{{ $cliente->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editarRolModal{{ $cliente->id }}Label">Editar Estado de {{ $cliente->name }}</h5>
                                                </div>
                                                <form action="{{ route('cliente.actualizar-rol', ['id' => $cliente->id]) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <!-- Selección del nuevo rol -->
                                                        <label for="selectRol">Seleccionar Estadol:</label>
                                                        <select class="form-control" id="selectRol" name="rol">
                                                            <option value="user">Activo</option>
                                                            <option value="domi">Inactivo</option>
                                                            <!-- Agrega las opciones correspondientes a los roles disponibles -->
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <!-- Agrega aquí el botón para guardar el nuevo rol -->
                                                        {{-- <button type="submit" class="btn btn-primary">Actualizar Estado</button> --}}
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

<div class="modal fade" id="registrarDomi" tabindex="-1" role="dialog" aria-labelledby="registrarDomi" aria-hidden="true" data-backdrop="static" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrarDomi">Registrar Domiciliario</h5>
            </div>
            <form action="{{ route('registrarDomi') }}" method="POST">
            @csrf
            <div class="modal-body">
                <!-- Selección del nuevo rol -->
                <input type="text" name="name" class="form-control" placeholder="{{ __('Name...') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <input type="text" name="apellidos" class="form-control" placeholder="{{ __('Apellido...') }}" value="{{ old('apellidos') }}" required autocomplete="apellidos">
                <div class="input-group">
                    <select name="TipoDocumento" class="form-control" required>
                      <option value="CC">{{ __('Cedula de Ciudadania') }}</option>
                      <option value="TI">{{ __('Targeta de Identidad') }}</option>
                      <!-- Agrega otras opciones según sea necesario -->
                    </select>
                </div>
                <input type="text" id="NumDocumento" name="NumDocumento" class="form-control" placeholder="{{ __('Numero de Documento...') }}" value="{{ old('NumDocumento') }}" required>
                <input type="date" name="FechaNacimiento" class="form-control" placeholder="{{ __('Fecha de Nacimiento...') }}" value="{{ old('FechaNacimiento') }}" required>
                <input type="text" name="Telefono" class="form-control" placeholder="{{ __('Telefono...') }}" value="{{ old('Telefono') }}" required>
                <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required autocomplete="username">
                <input type="text" name="Direccion" class="form-control" placeholder="{{ __('Direccion...') }}" value="{{ old('Direccion') }}" required>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Contraseña...') }}" required autocomplete="new-password">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar Contraseña...') }}" required autocomplete="new-password">
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="button" class="btn btn-primary" onclick="location.reload();">Cancelar</button>                                                    
                </div>
            </form>
        </div>
    </div>
</div>