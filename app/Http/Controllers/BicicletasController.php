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

class BicicletasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $usuarios = DB::table('users')
        ->join('bicicletas', 'users.id', '=', 'bicicletas.iddomiciliario')
        ->select( 
            DB::raw("CONCAT(users.name, ' ', users.apellidos) AS fullname"), 
            'users.email', 
            'users.telefono', 
            'users.direccion',
            'users.numDocumento',
            'users.tipoDocumento', 
            'users.fechaNacimiento', 
            'bicicletas.idbicicleta', 
            'bicicletas.tipo',
            'bicicletas.propietario'
        )
        ->get();    
        return view('administrador/bicicletas', ['usuarios' => $usuarios]);
    }

    public function sinDomiciliario()
{
    // Bicicletas sin domiciliario vinculado
    $usuarios =DB::table('bicicletas')
    ->select('tipo','IdBicicleta')
    ->whereNull('bicicletas.iddomiciliario')
    ->get();

    $usuariosDomi = User::where('rol','=', 'domi')->get();

    
    return view('administrador/bicisindomi', ['usuarios' => $usuarios,'usuariosDomi' => $usuariosDomi ]);
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
  public function update(Request $request,) {
        // Obtén los datos del formulario

    }

    public function updateb(Request $request, $id) {
        // Encuentra la bicicleta por su ID
        $bicicleta = Bicicletas::find($id);

        if ($bicicleta) {
            // Asigna el ID del domiciliario desde el formulario al modelo de bicicleta
            $bicicleta->idDomiciliario = $request->input('idDomiciliario');
            $bicicleta->save();

            // Redirige a alguna ruta o devuelve una respuesta aquí
            // Por ejemplo, redirigir de nuevo a la página de bicicletas
            return redirect()->route('bicicletas.index')->with('success', 'Bicicleta asignada correctamente');
        } else {
            // Manejar el caso en el que la bicicleta no se encuentre
            // Puedes redirigir a alguna ruta o mostrar un mensaje de error
            return redirect()->back()->with('error', 'Bicicleta no encontrada');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
