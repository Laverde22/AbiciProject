@extends('layouts.main', ['activePage' => 'factura', 'titlePage' => __('FACTURAS')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>Listado de Facturas</h2>
                    <div class="">
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                @foreach($facturas as $factura) 
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Factura {{ $factura->IdFactura }}</h4>
                            </div>
                            <div class="card-body">
                                <p><strong>Fecha:</strong> {{ $factura->FechaHora }}</p>
                                <p><strong>Cliente:</strong> {{ $factura->name . ' ' . $factura->apellidos }}</p>
                                <p><strong>Dirección:</strong> {{ $factura->Direccion }}</p>
                                <p><strong>Productos:</strong> {{ $factura->Productos }}</p>
                                <p><strong>Proveedor:</strong> {{ $factura->Nombre }}</p>
                                <p><strong>Valor Productos:</strong> {{ $factura->ValorProductos }}</p>
                                <p><strong>Valor Servicios:</strong> {{ $factura->ValorServicio }}</p>
                                <p><strong>Valor Total:</strong> {{ $factura->ValorProductos + $factura->ValorServicio }}</p>
                                <p><strong>Domiciliario:</strong> {{ $factura->name }}</p>
                            </div>
                            <div class="card-footer">
                                <!-- Aquí puedes colocar botones o enlaces adicionales si es necesario -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



   <!-- Modal para crear factura -->
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
                        <label for="numero_factura">Número de Factura:</label>
                        <input type="text" class="form-control" id="numero_factura" name="numero_factura" required>
                    </div>
                    <div class="form-group">
                        <!-- Agrega más campos según tu estructura de datos -->
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

<!-- JavaScript para inicializar los componentes del formulario dentro del modal -->





