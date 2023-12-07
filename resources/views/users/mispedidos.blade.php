@extends('layouts.main', ['activePage' => 'pedi', 'titlePage' => __('TUSPEDIDOS')])
<link rel="stylesheet" href="{{ asset('css/tablas.css') }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado De Todos Tus Pedidos</h2>
            <div >
              <button type="button" class="btn btn-primary" id="crearPedidoBtn" data-toggle="modal" data-target="#crearPedidoModal">
                 Crea tu Pedido
               </button>
             </div>
            <div class="row">
                @if($pedidos->isEmpty())
                <div class="card">
                    <p>No hay pedidos disponibles.</p>
                    <button type="button" class="btn btn-primary" id="crearPedidoBtn" data-toggle="modal" data-target="#crearPedidoModal">
                        Crea tu Pedido
                      </button>
                </div>
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
                                
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalPedido{{ $pedido->IdPedido }}">
                                        <i class="material-icons">add</i> Más Info...
                                    </button>                                
                                </div>
                            </div>
                        </div>

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
                                
                                  @elseif($pedido->estado === 'Finalizado' || $pedido->estado === 'Denegado')
                                      <!-- Botones para estados Finalizado o Denegado -->
                                      <button class="btn btn-success">Generar Reporte</button>
                                  @endif
                                  <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
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

<!-- Modal para el formulario de crear pedido -->
<div class="modal fade" id="crearPedidoModal" tabindex="-1" role="dialog" aria-labelledby="crearPedidoModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="crearPedidoModalLabel">Crear Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Aquí colocarías tu formulario para crear el pedido -->
          <form action="{{route('users.store')}}" method="POST">
            @csrf
            <!-- Campos del formulario -->
            <!-- ... -->
            <div class="form-group">
              <label for="productos">¿Que podemos hacer por ti?</label>
              <textarea name="productos" id="productos" class="form-control" rows="3" placeholder="Listado de productos o describe el servicio que desees..."></textarea>
            </div>
            <div class="form-group">
                <label for="descripcion">Recuerda que puedes agregar una descripcion mas especifica si lo deseas</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Describe marcas y locales, recuerda que puedes darnos sugerencias sobre tu pedido"></textarea>
              </div class="form-group">
              <div class="mb-3">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" value="{{$direccion}}" id="direccion" name="direccion">
            </div>
            <div class="mb-3">
                <input type="hidden" name="fechahora" value="{{ now()->format('Y-m-d H:i:s') }}">
            </div>
          </div>             
        </div>

            <button type="submit" class="btn btn-primary">Crear Pedido</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  