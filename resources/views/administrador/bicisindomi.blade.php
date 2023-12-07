@extends('layouts.main', ['activePage' => 'bici', 'titlePage' => __('BICICLETAS')])
<link rel="stylesheet" href="{{asset('css/dashboardadmin.css')}}">
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container-fluid">
                <h2>Bicicletas Sin Asignar</h2>
                <button type="button" class="btn btn-primary" id="crearPedidoBtn" data-toggle="modal" data-target="#crearPedidoModal">
                    Crea Bicicleta
                  </button>
                @if($usuarios->isEmpty())
                <p>No hay Bicicletas que cumplan estas caracteristicas</p>
            @else
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bicicletas.index') }}">
                            {{ __('Bicicletas') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bicicletas.sin-domiciliario') }}">
                        {{ __('Sin Domiciliario') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Bicicleta Tipo</th>
                        <th>Domiciliario Responsable</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $cliente)
                    <tr>
                        <td>{{ $cliente->tipo }}</td>
                        <td>No Asignado</td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalCliente">Asignar Domiciliario</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
                    @foreach($usuarios as $cliente) 
                        <!-- Modal para cada cliente -->
                        <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalClienteLabel" aria-hidden="true"  >
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
