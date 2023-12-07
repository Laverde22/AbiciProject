<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedidos; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\factura; 
use App\Models\detallefactura; 
use DB;

class BusquedasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchCli(Request $request)
    {
        $criterio = $request->input('criterio');
        $valor = $request->input('valor');
    
        // Realiza la búsqueda según el criterio seleccionado
        $rol = User::where($criterio, $valor)->get();
    
        return view('administrador/listclientes', ['rol' => $rol]);
    }

    public function filtrarPedidos(Request $request)
    {
        $estado = $request->input('estado');

        // Lógica para filtrar los pedidos según el estado proporcionado
        $pedidos = Pedidos::where('estado', $estado)->get();

        // Devolver los resultados como una vista parcial o JSON, dependiendo de tu lógica
        return view('administrador.listpedidos', compact('pedidos'));
    }

    public function index()
    {
        //
        return view('users/ayuda');
    }
    
}
