@extends('layouts.main', ['activePage' => 'bici', 'titlePage' => __('BICICLETAS')])
<link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <h2>Listado de Bicicletas</h2>
                @if($usuarios->isEmpty())
                <p>No hay Bicicletas que cumplan estas caracteristicas</p>
            @else
           {{--  <form action="{{ route('admin.searchcli') }}" method="GET" class="mb-4">
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
            </form> --}}
            
            
                <div class="row">
                    @foreach($usuarios as $cliente)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"> Bicicleta Tipo {{ $cliente->tipo }}</h4>
                                    <p class="card-text">Domiciliario Responsable: No Asignado</p>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalCliente">Asignar Domiciliario</a>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para cada cliente -->
                        <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteLabel" aria-hidden="true" data-backdrop="static" >
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editarRolModalLabel">Asignar Domiciliario a la Bicicleta {{ $cliente->tipo }}</h5>  
                                    </div>
                                    <form method="POST" action="{{ route('bicicletas.updateb', $cliente->IdBicicleta) }}">
                                        @csrf
                                        @method('PUT') <!-- Método PUT simulado -->
                                        <div class="modal-body">
                                            <label for="selectDomiciliario">Seleccionar Domiciliario:</label>
                                            <select class="form-control" id="selectDomiciliario" name="idDomiciliario">
                                                @foreach ($usuariosDomi as $usuario)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Asignar Bicicleta</button>    
                                        </div>
                                    </form>
                                    
                                    
                                    
                                    <!-- Formulario para asignar bicicleta a un usuario domi -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection
