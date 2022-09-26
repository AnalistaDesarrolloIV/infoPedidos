<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    public function pendientes()
    {
        $pendi = DB::connection('sqlsrv')->table('info_11')->get()->all();
        // dd($pendi);
        return view('Pedidos.listas.Pendientes.tipos', compact('pendi'));
    }

    public function pendi($tipo)
    {
        if ($tipo == "Pedidos tipo 5") {

            $pedido = DB::connection('sqlsrv')->table('info_111')->get()->all();
            // dd($pendi);

        }else if($tipo == "Pedidos tipo 6"){
            
            $pedido = DB::connection('sqlsrv')->table('info_112')->get()->all();
            // dd($pendi);

        }else if($tipo == "Pedidos tipo 7") {
            
            $pedido = DB::connection('sqlsrv')->table('info_113')->get()->all();
            // dd($pendi);

        }
        
        return view('Pedidos.listas.Pendientes.lista', compact('pedido', 'tipo'));
    }

    public function detallePed($id)
    {
        dd($id);
        // $pedido = DB::connection('sqlsrv')->table("info_oden('$id')")->get()->all();
        // dd($pedido);
    }
    
    public function lanzados()
    {
        $lanza = DB::connection('sqlsrv')->table('info_12')->get()->all();
        // dd($lanza);
        return view('Pedidos.listas.Lanzados.lista', compact('lanza'));
    }
    
    public function consolidar()
    {
        $conso = DB::connection('sqlsrv')->table('info_13')->get()->all();
        // dd($conso);
        return view('Pedidos.listas.Consolidar.lista', compact('conso'));
    }
    
    public function error()
    {
        $error = DB::connection('sqlsrv')->table('info_14')->get()->all();
        // dd($error);
        return view('Pedidos.listas.Error.lista', compact('error'));
    }
}
