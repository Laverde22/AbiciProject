@extends('layouts.main', ['activePage' => 'pedidos', 'titlePage' => __('Editar Pedido')])
<link rel="stylesheet" href="{{asset('css/pedidoadmin.css')}}">
@section('content')
<div class="content">
    <div class="container-fluid">
        <h2>Editar Pedido</h2>
        <form method="POST" action="{{ route('pedidos.update', $pedido->IdPedido) }}">
            @csrf
            @method('PUT')

            <!-- IdPedido -->
            <input type="hidden" name="IdPedido" value="{{ $pedido->IdPedido }}" hidden>


            <!-- idCliente -->
            <div class="form-group">

                <input type="text" name="idCliente" value="{{$pedido->idCliente}}" hidden>
                <label for="idCliente">Cliente</label>
                <select class="form-control" name="idCliente" disabled>
                    @foreach($usuarios as $usuario)
                        <option  value="{{ $usuario->id }}" @if($usuario->id == $pedido->idCliente) selected @endif>
                            {{ $usuario->name }} {{ $usuario->apellidos }}
                        </option>
                    @endforeach
                </select>  
            </div>
           
            <!-- idAdministracion -->
            <input type="hidden" name="idAdministracion" value="{{ auth()->id() }}">

            <!-- FechaHora -->
            <input type="hidden" name="FechaHora" value="{{ now() }}">

            <!-- Productos -->
            <div class="form-group">
                <label for="Productos">Productos</label>
                <input type="text" class="form-control" id="Productos" name="Productos" value="{{ $pedido->Productos }}" readonly>
            </div>

               <!-- DescripcionProductos -->
               <div class="form-group">
                <label for="DescripcionProductos">Descripción de Productos</label>
                <textarea class="form-control" id="DescripcionProductos" name="DescripcionProductos" readonly>{{ $pedido->DescripcionProductos }}</textarea>
            </div>

              <!-- Direccion -->
              <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input type="text" class="form-control" id="Direccion" name="Direccion" value="{{ $pedido->Direccion }}" readonly>
            </div>


                   <!-- idDomiciliario -->
                   <div class="form-group">
                    <label for="idDomiciliario">Domiciliario</label>
                    <div class="custom-select">
                        <select class="form-control" id="idDomiciliario" name="idDomiciliario">
                            <!-- Filtrar y mostrar solo los usuarios con rol de domiciliario -->
                            @foreach ($usuarios->where('rol', 'domi') as $usuario)
                                <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                        <span class="arrow"></span> <!-- Flecha para indicar que es un select -->
                    </div>
                </div>
                
                

            <!-- TiempoEstimadomin -->
            <div class="form-group">
                <label for="TiempoEstimadomin">Tiempo Estimado en Minutos</label>
                <input type="number" class="form-control" id="TiempoEstimadomin" name="TiempoEstimadomin" value="{{ $pedido->TiempoEstimadomin }}">
            </div>

            <!-- HoraEstimada -->
            <div class="form-group">
                <label for="HoraEstimada">Hora Estimada de Entrega</label>
                <input type="time" class="form-control" id="HoraEstimada" name="HoraEstimada" value="{{ $pedido->HoraEstimada }}">
            </div>

            <!-- Estado -->
            <div class="form-group">
                <label for="estado">Estado</label>
                <div class="custom-select">
                    <select class="form-control" id="estado" name="estado">
                        <option value="Pendiente" {{ $pedido->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En Proceso" {{ $pedido->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="Finalizado" {{ $pedido->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                        <option value="Denegado" {{ $pedido->estado == 'Denegado' ? 'selected' : '' }}>Denegado</option>
                    </select>
                    <span class="arrow"></span> <!-- Flecha para indicar que es un select -->
                </div>
            </div>
            

            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>
@endsection
