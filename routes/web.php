<?php

use App\Http\Controllers\PedidosController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    $invoices = DB::connection('sqlsrv')->table('info_1')->get()->all();
    // dd($invoices);

    return view('Pedidos.categorias', compact('invoices'));
})->name('inicio');

Route::get('/pendientes',[PedidosController::class,'pendientes'])->name('pendientes');
Route::get('/pendi/{tipo}',[PedidosController::class,'pendi'])->name('pendi');
Route::get('/detallePed/{id}',[PedidosController::class,'detallePed'])->name('detallePedido');


Route::get('/lanzados',[PedidosController::class,'lanzados'])->name('lanzados');
Route::get('/consolidar',[PedidosController::class,'consolidar'])->name('consolidar');



Route::get('/error',[PedidosController::class,'error'])->name('error');
Route::get('/delete/{id}',[PedidosController::class,'BorrarError'])->name('delete');



