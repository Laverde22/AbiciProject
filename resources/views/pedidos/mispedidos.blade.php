<link rel="stylesheet" href="{{ asset('css/mispedidos.css') }}">
<x-app-layout></x-app-layout>

<section>
    <table>
        <thead>
            <tr>
                <th>Productos</th>
                <th>Descripcion Productos</th>
                <th>Direccion</th>
                <th>Fecha Hora</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->productos }}</td>
                    <td>
                        @if($pedido->descriprodu !== null && $pedido->descriprodu !== '')
                            {{ $pedido->descriprodu }}
                        @else
                            No hay descripción
                        @endif
                    </td>
                    <td>{{$pedido->direccion}}</td> 
                    <td>{{ $pedido->fecha }}</td>               
                </tr>
            @endforeach
        </tbody>
    </table>
    
</section>