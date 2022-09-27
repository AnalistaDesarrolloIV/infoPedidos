<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Alert;

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
        $lanza = DB::connection('sqlsrv')->table('info_12')->orderBy('d')->get()->all();
        // dd($lanza);
        return view('Pedidos.listas.Lanzados.lista', compact('lanza'));
    }




    
    public function consolidar()
    {
        $conso = DB::connection('sqlsrv')->table('info_13')->orderBy('NP')->get()->all();
        // dd($conso);
        return view('Pedidos.listas.Consolidar.lista', compact('conso'));
    }



    
    public function error()
    {
        $error = DB::connection('sqlsrv')->table('l3_expo_ordini')->where('eo_error', 1)->orderBy('eo_descr')->get()->all();
        // dd($error);
        return view('Pedidos.listas.Error.lista', compact('error'));
    }

    public function BorrarError($id)
    {
        // dd($id);
        $cambio = DB::connection('sqlsrv')->table('l3_expo_ordini')->where('eo_descr', $id)->update([
            "eo_error" => 0,
        ]);
        Alert::success('Pedido', 'Edición pedido con error exitosa');
        return redirect()->route('inicio');
    }


}
