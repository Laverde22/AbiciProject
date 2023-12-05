<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\factura; 
use App\Models\detallefactura;
use App\Models\Bicicletas;
use App\Models\provedores;
use DB;

class DomiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $idDomiciliario = Auth::user()->id; // Suponiendo que el campo de ID sea 'id'
    
        $pedidos = DB::table('pedidos')
        ->join('users', 'pedidos.idCliente', '=', 'users.id')
        ->select('pedidos.*', 'users.name as nombre') // Seleccionar los campos deseados
        ->where('pedidos.idDomiciliario', '=', $idDomiciliario)
        ->get();
    
        $proveedores = Provedores::orderBy('nombre', 'asc')->get();
        
        return view('domiciliario.pedidos', compact('pedidos', 'proveedores'));
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
