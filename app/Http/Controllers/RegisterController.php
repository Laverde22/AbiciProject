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

        
    } 

    public function indexpersonal()
    {

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

    public function registrarAdmin(Request $request)
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

        $user->assignRole('Admin');
        return redirect()->route('admin.listadmins');
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