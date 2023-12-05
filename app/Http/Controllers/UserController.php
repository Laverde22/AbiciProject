<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\facturas; 
use App\Models\detallefactura;
use App\Models\Bicicletas;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cliente = auth()->user()->id;

        $pedidos = DB:: table ('detallefactura')
            ->join('pedidos', 'detallefactura.idpedido', '=', 'pedidos.IdPedido')
            ->select('pedidos.productos as productos', 'pedidos.direccion as direccion', 'pedidos.created_at as fecha','pedidos.descripcionproductos as descriprodu','detallefactura.valorproductos as valproductos',
                      'detallefactura.valorservicio as valservicio','detallefactura.valortotal as valtotal')
            ->where('pedidos.idCliente','=', $cliente)
            ->get();

        return $pedidos;

        /* return view('users/mispedidos',['pedidos' => $pedidos]);
 */    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
