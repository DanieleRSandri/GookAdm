<?php

namespace App\Http\Controllers;
use App\Models\ConsumoCliente;
use App\Http\Requests\ConsumoClienteRequest;

use Illuminate\Http\Request;

class ConsumoClienteController extends Controller
{
    public function index(){
        $consumoClientes = ConsumoCliente::orderBy('id_cliente')->paginate(5);
        return view('consumoCliente.index', ['consumoCliente'=>$consumoClientes]);
    }

      public function destroy($id)
    {
        try {
            ConsumoCliente::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit($id){
        $consumoClientes = ConsumoCliente::find($id);
        return view('consumoCliente.edit', compact('consumoClientes'));
    }
    
    public function update(ConsumoClienteRequest $request, $id){
        ConsumoCliente::find($id)->update($request->all());
        return redirect('consumoClientes');
    }
}
