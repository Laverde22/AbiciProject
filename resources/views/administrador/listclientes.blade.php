@extends('layouts.main', ['activePage' => 'clientes', 'titlePage' => __('Clientes')])
<link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado de Clientes</h2>
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
                                        <h5 class="modal-title" id="modalCliente{{ $cliente->id }}Label">Detalles de  {{ $cliente->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Mostrar aquí los detalles del cliente -->
                                        <p><strong>Nombre:</strong>{{ $cliente->name . ' ' . $cliente->apellidos }}</p>
                                        <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
                                        <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                                        <p><strong>Correo:</strong> {{ $cliente->email }}</p>
                                        <p ><strong>Fecha De Nacimineto:</strong> {{ $cliente->fechaNacimiento }}</p>
                                        <p><strong>{{ $cliente->tipoDocumento }}:</strong> {{ $cliente->numDocumento }}</p>
                                        
                                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarRolModal{{ $cliente->id }}">Editar Rol</button> --}}
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                   
                                       <!-- Modal para editar rol -->
                                    <div class="modal fade" id="editarRolModal{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="editarRolModal{{ $cliente->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    {{-- <h5 class="modal-title" id="editarRolModal{{ $cliente->id }}Label">Editar Rol de {{ $cliente->name }}</h5> --}}
                                                </div>
                                                <form action="{{ route('cliente.actualizar-rol', ['id' => $cliente->id]) }}" method="POST">
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
                                                        {{-- <button type="submit" class="btn btn-primary">Actualizar Rol</button> --}}
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
   
    <script>
        // JavaScript para cerrar el modal
        $('#editarRolModal{{ $cliente->id }}').on('hidden.bs.modal', function () {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        });
    </script>

@endsection

