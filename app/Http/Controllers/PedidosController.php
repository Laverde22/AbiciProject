<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\factura; 
use App\Models\detallefactura; 
use DB;

class PedidosController extends Controller
{
   

    /**
     * Display a listing of the resource.
     */
     


    /**
     * Store a newly created resource in storage.
     */
    public function guardardatos(Request $request)
    {
       
       
        // Crear un nuevo objeto Pedido con los datos del formulario
        $pedido = new Pedidos();
        $pedido->productos = $request->input('productos');
        $pedido->DescripcionProductos = $request->input('descripcion');
        $pedido->direccion = $request->input('direccion');
        $pedido->fechahora = $request->input('fechahora');
        $idCliente = Auth()->User()->id;
        $pedido->idcliente = $idCliente;
        // Guardar el pedido en la base de datos
        $pedido->save();

        // Redirigir a la página que desees después de guardar el pedido
        return redirect()->route('dashboard');
  
    }
    public function store(Request $request)
    {
    
        // Crear un nuevo pedido con los datos del formulario
  
    }

    public function mostrarPedidos()
    {
        $cliente = auth()->user()->id;

        $pedidos = DB:: table ('detallefacturas')
            ->join('pedidos', 'detallefacturas.idpedido', '=', 'pedidos.IdPedido')
            ->select('pedidos.productos as productos', 'pedidos.direccion as direccion', 'pedidos.created_at as fecha','pedidos.descripcionproductos as descriprodu','detallefacturas.valorproductos as valproductos',
                      'detallefacturas.valorservicio as valservicio','detallefacturas.valortotal as valtotal')
            ->where('pedidos.idcliente','=', $cliente)
            ->get();

        return view('pedidos/mispedidos',['pedidos' => $pedidos]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
