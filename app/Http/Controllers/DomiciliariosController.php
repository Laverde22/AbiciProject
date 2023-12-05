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

class DomiciliariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = DB::table('bicicletas')
        ->join('users', 'bicicletas.iddomiciliario', '=', 'users.id')
        ->select( DB::raw("CONCAT(users.name, ' ', users.apellidos) as fullname"),'users.id', 'users.email','users.created_at','users.updated_at','users.estado',
        'users.fechaNacimiento','users.telefono','users.direccion','users.tipoDocumento','users.numDocumento','bicicletas.tipo')
        ->where('users.rol', '=', 'domi')
        ->orderBy('users.name', 'asc')
        ->get();

        return view('administrador/domiciliarios', ['usuarios' => $usuarios]);
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
