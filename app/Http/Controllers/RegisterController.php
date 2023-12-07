<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
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

    public function index()
    {

        return view('administrador/register' , ['usuarios' => $usuarios]);
    } 

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
            'users.email',
            'users.fechanacimiento',
            'users.tipodocumento',
            'users.numdocumento',
            'model_has_roles.role_id'
        )
        ->orderBy('users.id') // Ordenar por el estado de forma ascendente
        ->where('model_has_roles.role_id', '=', '9') // Filtrar por estado pendiente
        ->get(); 
            
        return view('administrador/register' , ['rol' => $rol]);
    }
    

    public function create()
    {
        
    }

    public function store(Request $request)
    {    
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'NumDocumento' => $request['NumDocumento'],
            'TipoDocumento' => $request['TipoDocumento'],
            'Telefono' => $request['Telefono'],
            'Direccion' => $request['Direccion'],
            'FechaNacimiento' => $request['FechaNacimiento'],
            'apellidos' => $request['apellidos'],
            
        ]);

        $user->assignRole('Domi');
        return redirect()->route('admin.listpersonal');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}