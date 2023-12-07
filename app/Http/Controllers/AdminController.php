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

class AdminController extends Controller
{
   
   public function __construct()
   {
       $this->middleware('auth');
   }


    /**
     * Display a listing of the resource.
     */
    public function indexpedidos()
    {
        //
        $usuarios = User::orderBy('name', 'asc')->get();

        $pedidos = DB::table('pedidos')
        ->join('Users', 'pedidos.idCliente','=','Users.id')
        ->select( DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),'users.rol','pedidos.idCliente','pedidos.productos as Productos','pedidos.DescripcionProductos as descripedi','pedidos.Direccion','pedidos.estado','pedidos.IdPedido')
        ->orderBy(DB::raw("(CASE WHEN pedidos.estado = 'Pendiente' THEN 0 ELSE 1 END)"))
        ->get();

    return view('administrador/listpedidos', compact('pedidos','usuarios'));
     


    }
    public function listPedidos()
    {
            //
            $usuarios = user::orderBy('name','ASC')->get();

            $pedidos = DB::table('pedidos')
            ->join('Users', 'pedidos.idCliente','=','Users.id')
            ->select( DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),'users.rol','pedidos.idCliente','pedidos.productos as Productos','pedidos.DescripcionProductos as descripedi','pedidos.Direccion','pedidos.estado','pedidos.IdPedido')
            ->orderBy(DB::raw("(CASE WHEN pedidos.estado = 'Pendiente' THEN 0 ELSE 1 END)"))
            ->get();
    
        return view('administrador/listPedidos', compact('pedidos','usuarios'));
    }
    


    public function pendientes()
    {
        $usuarios = user::orderBy('name','ASC')->get();

        $pedidos = DB::table('pedidos')
        ->join('users', 'pedidos.idCliente', '=', 'users.id')
        ->select(
            DB::raw("CONCAT(users.name, ' ', users.apellidos) AS name"),
            'users.rol',
            'pedidos.idCliente',
            'pedidos.productos as Productos',
            'pedidos.DescripcionProductos as descripedi',
            'pedidos.Direccion',
            'pedidos.estado',
            'pedidos.IdPedido'
        )
        ->orderBy('pedidos.estado') // Ordenar por el estado de forma ascendente
        ->where('pedidos.estado', '=', 'pendiente') // Filtrar por estado pendiente
        ->get();       
        return view('administrador/pendientes', compact('pedidos','usuarios'));
    }


    
    public function enProceso()
    {
        $usuarios = user::orderBy('name','ASC')->get();

        $pedidos = DB::table('pedidos')
        ->join('users', 'pedidos.idCliente', '=', 'users.id')
        ->select(
            DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),
            'users.rol',
            'pedidos.idCliente',
            'pedidos.productos as Productos',
            'pedidos.DescripcionProductos as descripedi',
            'pedidos.Direccion',
            'pedidos.estado',
            'pedidos.IdPedido'
        )
        ->orderBy('pedidos.estado') // Ordenar por el estado de forma ascendente
        ->where('pedidos.estado', '=', 'En Proceso') // Filtrar por estado pendiente
        ->get();         
        return view('administrador/enProceso', compact('pedidos','usuarios'));
    }


    
    public function finalizados()
    {
        $usuarios = user::orderBy('name','ASC')->get();

        $pedidos = DB::table('pedidos')
        ->join('users', 'pedidos.idCliente', '=', 'users.id')
        ->select(
            DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),
            'users.rol',
            'pedidos.idCliente',
            'pedidos.productos as Productos',
            'pedidos.DescripcionProductos as descripedi',
            'pedidos.Direccion',
            'pedidos.estado',
            'pedidos.IdPedido'
        )
        ->orderBy('pedidos.estado') // Ordenar por el estado de forma ascendente
        ->where('pedidos.estado', '=', 'Finalizado') // Filtrar por estado pendiente
        ->get(); 
        
        return view('administrador/finalizados', compact('pedidos','usuarios'));
    }


    
    public function denegados()
    {
        $usuarios = user::orderBy('name','ASC')->get();

        $pedidos = DB::table('pedidos')
        ->join('users', 'pedidos.idCliente', '=', 'users.id')
        ->select(
            DB::raw("CONCAT(users.name, ' ', users.apellidos) AS nombrecompleto"),
            'users.rol',
            'pedidos.idCliente',
            'pedidos.productos as Productos',
            'pedidos.DescripcionProductos as descripedi',
            'pedidos.Direccion',
            'pedidos.estado',
            'pedidos.IdPedido'
        )
        ->orderBy('pedidos.estado') // Ordenar por el estado de forma ascendente
        ->where('pedidos.estado', '=', 'Denegado') // Filtrar por estado pendiente
        ->get(); 
        
        return view('administrador/denegados', compact('pedidos','usuarios'));
    }
    


    public function indexclientes()
    {
        $usuarios = Auth::user();
        $rol = DB::table('model_has_roles')
        ->join('users', 'model_has_roles.model_id', '=', 'users.id')
        ->select(
            'users.name',
            'users.apellidos',
            'users.email',
            'users.fechaNacimiento',
            'users.numDocumento',
            'users.tipoDocumento',
            'users.direccion',
            'users.id',
            'users.telefono',
            'model_has_roles.role_id'
        )
        ->orderBy('users.id') // Ordenar por el estado de forma ascendente
        ->where('model_has_roles.role_id', '=', '8') // Filtrar por estado pendiente
        ->get(); 
            
        return view('administrador/listclientes' , ['rol' => $rol]);
    }



    public function edit( $id)
    {
        //
        $pedido = Pedidos::find($id);
    /*     if (!$pedido) {
            return redirect()->route('admin.listpedidos')->with('error', 'El pedido no fue encontrado');
        } */
        $usuarios = User::all();
            return view('administrador/pedido', compact('pedido','usuarios'));
        
    }


    public function update(Request $request, int $id)
    {

    
        // Actualiza los datos del pedido
        Pedidos::where('idPedido', $id)->update([
            'idCliente' => $request->input('idCliente'),
            'idDomiciliario' => $request->input('idDomiciliario'),
            'idAdministracion' => $request->input('idAdministracion'),
            'FechaHora' => $request->input('FechaHora'),
            'TiempoEstimadomin' => $request->input('TiempoEstimadomin'),
            'HoraEstimada' => $request->input('HoraEstimada'),
            'DescripcionProductos' => $request->input('DescripcionProductos'),
            'Direccion' => $request->input('Direccion'),
            'estado' => $request->input('estado'),
        ]);
    
 
    
        // Redirecciona a la vista de listado de pedidos con un mensaje
        return redirect()->route('admin.listpedidos')->with('success', 'Pedido actualizado correctamente');  
    }

    public function actualizarRol(Request $request, $id)
    {
        $cliente = User::findOrFail($id);
    
        // Validar la solicitud y el nuevo rol recibido
        $request->validate([
            'rol' => 'required|in:user,domi', // Asegúrate de que el rol sea 'user' o 'domi'
        ]);
    
        // Actualizar el campo 'rol' del cliente con el valor enviado en la solicitud
        $cliente->rol = $request->input('rol');
        $cliente->save();
    
        // Redirigir a la página deseada después de la actualización (por ejemplo, la lista de clientes)
        return redirect()->route('admin.listclientes')->with('success', 'Rol actualizado exitosamente');
    }

    

    public function cancelar(Request $request, $id) {
        $pedido = pedidos::findOrFail($id);

    
        Pedidos::where('idPedido', $id)->update([
        
            'estado' => 'Denegado',
        ]);

        return redirect()->route('admin.listpedidos');  
    }

    public function indexpersonal()
    {
        $usuarios = Auth::user();
        $rol = DB::table('model_has_roles')
        ->join('users', 'model_has_roles.model_id', '=', 'users.id')
        ->select(
            'users.name',
            'users.apellidos',
            'users.email',
            'users.fechaNacimiento',
            'users.numDocumento',
            'users.tipoDocumento',
            'users.direccion',
            'users.id',
            'users.telefono',
            'model_has_roles.role_id'
        )
        ->orderBy('users.id') // Ordenar por el estado de forma ascendente
        ->where('model_has_roles.role_id', '=', '9') // Filtrar por estado pendiente
        ->get(); 
            
        return view('administrador/listpersonal' , ['rol' => $rol]);
    }
    
}

