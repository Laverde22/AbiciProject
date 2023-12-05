<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\factura; 
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

        $direccion = auth()->user()->direccion;

        $pedidos = DB::table('pedidos')
        ->join('Users', 'pedidos.idCliente','=','Users.id')
        ->select( DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),'users.rol','pedidos.idCliente','pedidos.productos as Productos','pedidos.DescripcionProductos as descripedi','pedidos.Direccion','pedidos.estado','pedidos.IdPedido')
        ->where('pedidos.idcliente','=', $cliente)
        ->orderBy(DB::raw("(CASE WHEN pedidos.estado = 'Pendiente' THEN 0 ELSE 1 END)"))
        ->get();       
        return view('users/mispedidos',['pedidos' => $pedidos,'direccion'=>$direccion]);
    }

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
