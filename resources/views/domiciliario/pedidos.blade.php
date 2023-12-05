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
       +                 @if($pedido->estado === 'En Proceso')
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">Cliente: {{ $pedido->nombrecompleto }}</p>
                                        <p class="card-text">Productos: {{ $pedido->Productos }}</p>
                                        <p class="card-text">Dirección: {{ $pedido->Direccion }}</p>
                                        <p class="card-text text-primary font-weight-bold ">Estado: {{$pedido->estado}} </p>
                                        <button type="button" class="btn btn-primary crear-factura" data-toggle="modal" data-target="#modalCrearFactura" data-pedido-id="{{ $pedido->id }}"><i class="material-icons">library_books</i> Crear Factura</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
 @endsection

 <div class="modal fade" id="modalCrearFactura" tabindex="-1" role="dialog" aria-labelledby="modalCrearFacturaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearFacturaLabel">Crear Factura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario con campos editables -->
                <form method="POST" action="">
                    @csrf
                    <!-- Aquí colocas los campos necesarios para tu formulario -->
                    <div class="form-group">
                        <label for="numero_factura">:</label>
                        <input type="text" class="form-control" id="numero_factura" name="numero_factura" required>
                    </div>
                    <div class="form-group">
                        <label for="numero_factura">Número de Factura:</label>
                        <input type="text" class="form-control" id="numero_factura" name="numero_factura" required>
                    </div>
                    <!-- Agrega el resto de los campos necesarios -->
                    <!-- ... -->

                    <button type="submit" class="btn btn-success">Guardar Factura</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

        