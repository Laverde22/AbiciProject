<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BusquedasController;
use App\Http\Controllers\BicicletasController;
use App\Http\Controllers\DomiciliariosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\DomiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

 Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('/dashboard');
    })->name('dashboard');
}); 

Route::group(['middleware' => 'auth'], function(){

/* Rutas pedido  cliente pedido*/ 


/* Rutas pedido  admin */

Route::get('administrador/listpedidos',[App\Http\Controllers\AdminController::class,'indexpedidos'])->name('admin.listpedidos');
Route::get('pedidos/{id}/editar',[App\Http\Controllers\AdminController::class,'edit'])->name('pedidos.edit');
Route::put('pedidos/{id}/actualizar',[App\Http\Controllers\AdminController::class,'update'])->name('pedidos.update');
Route::get('administrador/listclientes',[App\Http\Controllers\AdminController::class,'indexclientes'])->name('admin.listclientes');
Route::get('administrador/listpersonal',[App\Http\Controllers\AdminController::class,'indexpersonal'])->name('admin.listpersonal');
Route::put('/administrador/{id}/cancelar', [App\Http\Controllers\AdminController::class, 'cancelar'])->name('pedidos.cancelar');

Route::get('/pedidos', [AdminController::class, 'listPedidos'])->name('pedidos.list');
Route::get('/pedidos/pendientes', [AdminController::class, 'pendientes'])->name('pedidos.pendientes');
Route::get('/pedidos/en-proceso', [AdminController::class, 'enProceso'])->name('pedidos.en-proceso');
Route::get('/pedidos/finalizados', [AdminController::class, 'finalizados'])->name('pedidos.finalizados');
Route::get('/pedidos/denegados', [AdminController::class, 'denegados'])->name('pedidos.denegados');

Route::put('/bicicletas/{id}/updateb', [BicicletasController::class, 'updateb'])->name('bicicletas.updateb');
Route::get('/bicicletas/con-domiciliarios', [BicicletasController::class, 'index'])->name('bicicletas.index');
Route::get('/bicicletas/sin-domiciliario', [BicicletasController::class, 'sinDomiciliario'])->name('bicicletas.sin-domiciliario');
Route::resource('bicicletas', App\Http\Controllers\BicicletasController::class);
Route::resource('domiciliarios', App\Http\Controllers\DomiciliariosController::class);

/* Actializar Cliente */
Route::post('/cliente/{id}/actualizar-rol',[App\Http\Controllers\AdminController::class,'actualizarrol'])->name('cliente.actualizar-rol');

/* Rutas Barras de Busqueda  */ 
Route::get('administrador/buscarCli', [App\Http\Controllers\BusquedasController::class, 'searchCli'])->name('admin.searchcli');
Route::get('users/ayuda', [App\Http\Controllers\BusquedasController::class,'index'])->name('users.ayuda');

/*   rutas rol user   */
Route::resource('users', App\Http\Controllers\UserController::class);


/*   RUTAS FACTURA  */ 
Route::resource('facturas', App\Http\Controllers\FacturasController::class);

/*   Rutas Domciiario   */

Route::resource('domiciliario', App\Http\Controllers\DomiController::class);


Route::post('administrador/registrarDomi',[App\Http\Controllers\RegisterController::class,'store'])->name('registrarDomi');

});