@extends('layouts.main', ['activePage' => 'pedidos', 'titlePage' => __('PEDIDOS')])
<link rel="stylesheet" href="{{ asset('css/tablas.css') }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado De Todos Los Pedidos</h2>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('pedidos.list', ['estado' => 'todos']) }}" >Todos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('pedidos.pendientes', ['estado' => 'pendientes']) }}">Pendientes</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('pedidos.en-proceso', ['estado' => 'enproceso']) }}">En Proceso</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('pedidos.finalizados', ['estado' => 'finalizados']) }}">Finalizados</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('pedidos.denegados', ['estado' => 'denegados']) }}">Denegados</a>
                    </li>
                  </ul>
                </div>
              </nav>
              
            <div class="row">
                @if($pedidos->isEmpty())
                    <p>No hay pedidos disponibles.</p>
                @else
                    
                        <div class="col-md-4 mb-4">
                            <div class="">
                                <div class="">
                                    <table class="table table-hover">

                                    <tr>
                                        <td><h3>Cliente</h3></td>
                                        <td><h3>Productos</h3></td>
                                        
                                        <td><h3>Direccion</h3></td>
                                        <td><h3>Estado</h3></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    @foreach($pedidos as $pedido)
                                    <tr>
                                        <td class="card-text" style="white-space: nowrap;">{{ $pedido->nombrecompleto }}</td>
                                        <td class="card-text">{{ $pedido->Productos }}</td>
                                        <td class="card-text" style="white-space: nowrap;">{{ $pedido->Direccion }}</td>
                                        
                                        <td class="card-text 
                                            @if($pedido->estado === 'Pendiente') text-danger font-weight-bold 
                                            @elseif($pedido->estado === 'Finalizado') text-secundary font-weight-bold 
                                            @elseif($pedido->estado === 'En Proceso') text-primary font-weight-bold 
                                            @endif" style="white-space: nowrap;">{{ $pedido->estado }}</td>
                                        <td class="card-text">@if($pedido->estado === 'Pendiente')
                                            <a href="#" class="btn btn-primary btn-aceptar" data-toggle="modal" data-target="#modalEditarPedido"><i class="material-icons">check</i> ACEPTAR</a>                          
                                            @endif</td>
                                        <td class="card-text"><button class="btn btn-primary" data-toggle="modal" data-target="#modalPedido{{ $pedido->IdPedido }}">
                                            <i class="material-icons">add</i> Más Info...</button></td>
                                        
                                    </tr>
                                    @endforeach
                                    </table>

                                    

                                    <p class="card-text 
                                    @if($pedido->estado === 'Pendiente') text-danger font-weight-bold 
                                    @elseif($pedido->estado === 'Finalizado') text-secundary font-weight-bold 
                                    @elseif($pedido->estado === 'En Proceso') text-primary font-weight-bold 
                                    @endif">
                                    {{ $pedido->estado }}
                                    </p>
                                    @if($pedido->estado === 'Pendiente')
                                    <a href="#" class="btn btn-primary btn-aceptar" data-toggle="modal" data-target="#modalEditarPedido"><i class="material-icons">check</i> ACEPTAR</a>                          
                                    @endif
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalPedido{{ $pedido->IdPedido }}">
                                            <i class="material-icons">add</i> Más Info...
                                        </button>                                
                                </div>
                            </div>
                        </div>
                        @foreach($pedidos as $pedido)
                        <!-- Modal para cada pedido -->
                        <div class="modal fade" id="modalPedido{{ $pedido->IdPedido }}" tabindex="-1" role="dialog" aria-labelledby="modalPedido{{ $pedido->IdPedido }}Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPedido{{ $pedido->IdPedido }}Label">Detalles del Pedido #{{ $pedido->IdPedido }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Cliente:</strong> {{ $pedido->nombrecompleto }}</p>
                                        <p><strong>Productos:</strong> {{ $pedido->Productos }}</p>
                                        <p><strong>Descripción Productos:</strong> {{ $pedido->descripedi }}</p>
                                        <p><strong>Dirección:</strong> {{ $pedido->Direccion }}</p>
                                        <p><strong>Estado:</strong> {{ $pedido->estado }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        @if($pedido->estado === 'En Proceso')
                                        <a href="{{ route('pedidos.cancelar', $pedido->IdPedido) }}" class="btn btn-danger" onclick="event.preventDefault();
                                            document.getElementById('cancelar-pedido-{{ $pedido->IdPedido }}').submit();">Cancelar Pedido
                                        </a>
                                
                                        <form id="cancelar-pedido-{{ $pedido->IdPedido }}" action="{{ route('pedidos.cancelar', $pedido->IdPedido) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    @elseif($pedido->estado === 'Pendiente')
                                        <a href="#" class="btn btn-primary btn-aceptar" data-toggle="modal" data-target="#modalEditarPedido"><i class="material-icons">check</i>
                                            ACEPTAR
                                        </a>
                                        <a href="{{ route('pedidos.cancelar', $pedido->IdPedido) }}" class="btn btn-danger" onclick="event.preventDefault();
                                            document.getElementById('cancelar-pedido-{{ $pedido->IdPedido }}').submit();">Rechazar Pedido
                                        </a>
                                        <form id="cancelar-pedido-{{ $pedido->IdPedido }}" action="{{ route('pedidos.cancelar', $pedido->IdPedido) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    @elseif($pedido->estado === 'Finalizado' || $pedido->estado === 'Denegado')
                                        <!-- Botones para estados Finalizado o Denegado -->
                                        <button class="btn btn-success">Generar Reporte</button>
                                    @endif
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalEditarPedido" tabindex="-1" role="dialog" aria-labelledby="modalEditarPedidoLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEditarPedidoLabel">Editar Pedido #{{ $pedido->IdPedido }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario con campos editables -->
                                        <form method="POST" action="{{ route('pedidos.update', $pedido->IdPedido) }}">
                                            @csrf
                                            @method('PUT')

                                            {{-- id cliente --}}
                                            <input type="hidden" name="idCliente" value="{{ $pedido->idCliente }}">
    
                                            {{-- id administracion --}}
                                            <input type="hidden" name="idAdministracion" value="{{ auth()->id() }}">

                                            <!-- IdPedido -->
                                            <input type="hidden" name="IdPedido" value="{{ $pedido->IdPedido }}" hidden>
                        
                                            {{-- fechahora --}}
                                            <input type="hidden" name="FechaHora" value="{{ now() }}">

                                            <!-- Productos -->
                                                <input type="hidden" class="form-control" id="Productos" name="Productos" value="{{ $pedido->Productos }}">

                                            <!-- DescripcionProductos -->
                                            <input type="hidden" id="DescripcionProductos" name="DescripcionProductos" value="{{ $pedido->descripedi }}">
                                            <div class="form-group">
                                                <label for="Direccion">Dirección</label>
                                                <input type="text" class="form-control" id="Direccion" name="Direccion" value="{{ $pedido->Direccion }}" readonly>
                                            </div>
                                            <!-- TiempoEstimadomin -->
                                            <div class="form-group">
                                                <label for="TiempoEstimadomin">Tiempo Estimado De Entrega "min"</label>
                                                <input type="number" class="form-control" id="TiempoEstimadomin" name="TiempoEstimadomin" >
                                            </div>
                        
                                            <!-- HoraEstimada -->
                                            <div class="form-group">
                                                <label for="HoraEstimada">Hora Estimada de Entrega</label>
                                                <input type="time" class="form-control" id="HoraEstimada" name="HoraEstimada" >
                                            </div>
                        
                                            <!-- idDomiciliario -->
                                            <div class="form-group">
                                                <label for="idDomiciliario">Domiciliario</label>
                                                <select class="form-control" id="idDomiciliario" name="idDomiciliario">
                                                    <!-- Opciones filtradas para los usuarios con rol de domiciliario -->
                                                    @foreach ($usuarios->where('rol', 'domi') as $usuario)
                                                        <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                        
                                            <!-- Estado -->
                                            <div class="form-group">
                                                <label for="estado">Estado</label>
                                                <select class="form-control" id="estado" name="estado">
                                                    <option value="Pendiente" {{ $pedido->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                                                    <option value="En Proceso" {{ $pedido->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                                                    <option value="Finalizado" {{ $pedido->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                                                    <option value="Denegado" {{ $pedido->estado == 'Denegado' ? 'selected' : '' }}>Denegado</option>
                                                </select>
                                            </div>
                        
                                            <!-- Botón para guardar cambios -->
                                            <button type="submit" class="btn btn-primary"><i class="material-icons">check</i> Aceptar Pedido</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
