<?php

namespace App\Http\Controllers;



use App\Models\pedidos; 
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\facturas; 
use App\Models\detallefactura;
use App\Models\Bicicletas;
use Illuminate\Http\Request;
use App\Models\register; 
use DB;

class RegisterController extends Controller
{

/*     public function indexpersonal()
    {
        //
        $usuarios = User::orderBy('name', 'asc')->get();

        return view('administrador/register' , ['usuarios' => $usuarios]);
    } */

    public function indexpersonal()
    {
        $usuarios = Auth::user();
        $rol = DB::table('model_has_roles')
        ->join('users', 'model_has_roles.model_id', '=', 'users.id')
        ->select(
            DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),
            'users.direccion',
            'users.id',
            'users.telefono',
            'model_has_roles.role_id'
        )
        ->orderBy('users.id') // Ordenar por el estado de forma ascendente
        ->where('model_has_roles.role_id', '=', '9') // Filtrar por estado pendiente
        ->get(); 
            
        return view('administrador/register' , ['usuarios' => $rol]);
    }
    



    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
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
