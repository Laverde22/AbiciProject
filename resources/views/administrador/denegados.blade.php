@extends('layouts.main', ['activePage' => 'pedidos', 'titlePage' => __('PEDIDOS')])
<link rel="stylesheet" href="{{ asset('css/tablas.css') }}">

@section('content')
    <div class="content">
        <div class="container-fluid">
            <h2>Listado de Pedidos Denegados</h2>
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
                                            <td><h3>Descripción</h3></td>
                                            <td><h3>direccion</h3></td>
                                            <td><h3>Estado</h3></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                        @foreach($pedidos as $pedido)
                                        <tr>
                                            <td class="card-text" style="white-space: nowrap;">{{ $pedido->nombrecompleto }}</td>
                                            <td class="card-text">{{ $pedido->Productos }}</td>
                                            <td class="card-text">{{ $pedido->descripedi}}</td>
                                            <td class="card-text" style="white-space: nowrap;">{{ $pedido->Direccion }}</td>

                                            <td class="card-text 
                                            @if($pedido->estado === 'Pendiente') text-danger font-weight-bold 
                                            @elseif($pedido->estado === 'Finalizado') text-secundary font-weight-bold 
                                            @elseif($pedido->estado === 'En Proceso') text-primary font-weight-bold 
                                            @endif" style="white-space: nowrap;">{{ $pedido->estado }}</td>
                                            <td><button class="btn btn-primary" data-toggle="modal" data-target="#modalPedido{{ $pedido->IdPedido }}"><i class="material-icons">add</i> MAS INFO...</button></td>
                                        </tr>
                                        
                                        @endforeach
                                        </table>

                                
                                    
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
                                        <button class="btn btn-success">Generar Reporte</button>
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
