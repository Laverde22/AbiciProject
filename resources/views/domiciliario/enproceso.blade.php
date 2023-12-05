@extends('layouts.main', ['activePage' => 'mispedidos', 'titlePage' => __('PEDIDOS')])
<link rel="stylesheet" href="{{ asset('css/tablas.css') }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado De Todos Los Pedidos</h2>
            <div class="row">
                @if($pedidos->isEmpty())
                    <p>No hay pedidos disponibles para ti.</p>
                @else
                    @foreach($pedidos as $pedido)
                        @if($pedido->estado === 'En Proceso')
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">Cliente: {{ $pedido->idCliente }}</p>
                                        <p class="card-text">Productos: {{ $pedido->Productos }}</p>
                                        <p class="card-text">Dirección: {{ $pedido->Direccion }}</p>
                                        <p class="card-text">Estado: {{ $pedido->estado }}</p>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearFactura"><i class="material-icons">library_books</i> Crear Factura</button>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="modal fade" id="modalCrearFactura" tabindex="-1" role="dialog" aria-labelledby="modalCrearFacturaLabel{{ $pedido->IdPedido }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCrearFacturaLabel{{ $pedido->IdPedido }}">Crear Factura para Pedido #{{ $pedido->IdPedido }}</h5>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario con campos editables -->
                                        <form method="POST" action="{{route('facturas.store')}}">
                                            @csrf
                                            <!-- Campos específicos para crear factura -->
                                            <input type="hidden" name="idcliente" value="{{ $pedido->idCliente }}">
                                            <input type="hidden" name="FechaHora"  value="{{ now() }}">
                                            <input type="hidden" name="Idpedido" value="{{ $pedido->IdPedido }}">
                                            <div class="form-group">
                                                <label for="IdProvedor">Proveedor:</label>
                                                <select class="form-control" id="IdProvedor" name="IdProvedor" required>
                                                    @foreach($proveedores as $provedor)
                                                        <option value="{{ $provedor->IdProvedor }}">{{ $provedor->Nombre }}</option>
                                                    @endforeach
                                                        <option value="NULL">No Aplica</option>

                                                </select>
                                            </div>                                            <!-- Otros campos -->
                                            <div class="form-group">
                                                <label for="tipo_servicio">Tipo de Servicio:</label>
                                                <select class="form-control" name="servicio" id="servicio">
                                                    <option value="Domicilio">Domicilio</option>
                                                    <option value="Favor">Favor Abici</option>
                                                    <option value="Mensajeria">Mensajeria</option>
                                                    <option value="BiciCarga">BiciCarga</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="valorproductos">Valor de Productos:</label>
                                                <input type="number" class="form-control" id="valorproductos" name="valorproductos" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="valorservicio">Valor de Servicio:</label>
                                                <input type="number" class="form-control" id="valorservicio" name="valorservicio" required>
                                            </div>

                                            <!-- Otros campos si los hay -->
                                            <button type="submit" class="btn btn-success">Guardar Factura</button>
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






        