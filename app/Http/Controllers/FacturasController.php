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

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $idUsuario = Auth::id();

// Consulta para obtener las facturas del usuario autenticado
    $facturas = DB::table('detallefacturas')
    ->join('facturas', 'detallefacturas.IdFactura','=', 'facturas.IdFactura')
    ->join('pedidos','detallefacturas.Idpedido','=','pedidos.IdPedido')
    ->join('provedores','detallefacturas.IdProvedor','=','provedores.IdProvedor')
    ->join('users','pedidos.idCliente','=','users.id')
    ->where('pedidos.idDomiciliario', $idUsuario) // Filtrar por el ID del usuario autenticado como domiciliario
    ->select(
        'detallefacturas.*', 
        'facturas.*',        
        'pedidos.*',       
        'provedores.*',     
        'users.*'           
    )
    ->get();
/*     
        $facturas = DB::table('detallefactura')
        ->join('factura', 'detallefactura.IdFactura','=', 'factura.IdFactura')
        ->join('pedidos','detallefactura.Idpedido','=','pedidos.IdPedido')
        ->join('provedores','detallefactura.IdProvedor','=','provedores.IdProvedor')
        ->join('users','pedidos.idCliente','=','users.id')
        ->select(
        'detallefactura.*', 
        'factura.*',        
        'pedidos.*',       
        'provedores.*',     
        'users.*'           
        )
        ->get(); */

   /* return $facturas;  */ 
        return view('facturas/index',['facturas' => $facturas]);
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
        // Crear la factura
        $factura = Factura::create([
            'idCliente' => $request->input('idcliente'),
            'FechaHora' => $request->input('FechaHora'),
            // Otros campos de la factura si los hay
        ]);
    
        $ultimofactura=factura::select('IdFactura')->orderBy('IdFactura','desc')->first(); //Toma el valor de la llave primaria del último registro creado
        $ultimoid=$ultimofactura["IdFactura"];
        // Verificar si la factura se creó correctamente y obtener su ID
  
    
            // Crear el detalle de factura asociado a la factura recién creada
            $detallesfactura = new DetalleFactura;
            $detallesfactura->IdFactura=$ultimoid; // Asignar el ID de la factura recién creada
            $detallesfactura->Idpedido = $request->input('Idpedido');
            $detallesfactura->IdProvedor = $request->input('IdProvedor');
            $detallesfactura->TipoServicio = $request->input('servicio');
            $detallesfactura->ValorProductos = $request->input('valorproductos');
            $detallesfactura->ValorServicio = $request->input('valorservicio');
            $detallesfactura->ValorTotal = $request->input('valortotal');
            $detallesfactura->save();
    
            return redirect()->back()->with("success", "Tu pedido está en camino!");
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
