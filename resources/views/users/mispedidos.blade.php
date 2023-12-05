@extends('layouts.main', ['activePage' => 'pedidos', 'titlePage' => __('PEDIDOS')])
<link rel="stylesheet" href="{{ asset('css/tablas.css') }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado De Tus Pedidos</h2>
            <div class="row">
                @if($pedidos->isEmpty())
                    <p>No hay pedidos disponibles.</p>
                @else
                    @foreach($pedidos as $pedido)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">Cliente: {{ $pedido->nombrecompleto }}</p>
                                    <p class="card-text">Productos: {{ $pedido->Productos }}</p>
                                    <p class="card-text">Dirección: {{ $pedido->Direccion }}</p>
                                    <p class="card-text 
                                    @if($pedido->estado === 'Pendiente') text-danger font-weight-bold 
                                    @elseif($pedido->estado === 'Finalizado') text-secundary font-weight-bold 
                                    @elseif($pedido->estado === 'En Proceso') text-primary font-weight-bold 
                                    @endif">
                                    Estado: {{ $pedido->estado }}
                                    </p>
                                    @if($pedido->estado === 'Pendiente')
                                    <a href="#" class="btn btn-primary btn-aceptar" data-toggle="modal" data-target="#modalEditarPedido"><i class="material-icons">check</i>
                                        ACEPTAR
                                    </a>                          
                                    @endif
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalPedido{{ $pedido->IdPedido }}">
                                            <i class="material-icons">add</i> Más Info...
                                        </button>                                
                                </div>
                            </div>
                        </div>

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
                                        <!-- Botones para estado Pendiente -->
                                        <button class="btn btn-primary">Aceptar</button>
                                        <a href="{{ route('pedidos.cancelar', $pedido->IdPedido) }}" class="btn btn-danger" onclick="event.preventDefault();
                                            document.getElementById('cancelar-pedido-{{ $pedido->IdPedido }}').submit();">Rechazar Pedido
                                        </a>
                                        
                                        <form id="cancelar-pedido-{{ $pedido->IdPedido }}" action="{{ route('pedidos.cancelar', $pedido->IdPedido) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form
                                    @elseif($pedido->estado === 'Finalizado' || $pedido->estado === 'Denegado')
                                        <!-- Botones para estados Finalizado o Denegado -->
                                        <button class="btn btn-success">Generar Reporte</button>
                                    @else
                                        <!-- Otros casos o condiciones adicionales -->
                                        <button class="btn btn-info">Otro Botón</button>
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
