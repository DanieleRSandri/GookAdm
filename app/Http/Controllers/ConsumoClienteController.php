<?php

namespace App\Http\Controllers;
use App\Models\ConsumoCliente;
use App\Http\Requests\ConsumoClienteRequest;

use Illuminate\Http\Request;

class ConsumoClienteController extends Controller
{
    public function index(){
        $consumoClientes = ConsumoCliente::All();
        return view('consumoCliente.index', ['consumoCliente'=>$consumoClientes]);
    }
   

    public function create(){
        return view('consumoCliente.create');
    }

    public function store(ConsumoClienteRequest $request){
        $consumoClientes = $request->all();
        ConsumoCliente::create($consumoClientes);

        return redirect('consumoClientes');
    }

    public function destroy($id){
        ConsumoCliente::find($id)->delete();
        return redirect('consumoClientes');
    }

    public function edit($id){
        $consumoClientes = ConsumoCliente::find($id);
        return view('consumoClientes.edit', compact('consumoClientes'));
    }
    
    public function update(ConsumoClienteRequest $request, $id){
        ConsumoCliente::find($id)->update($request->all());
        return redirect('consumoClientes');
    }
}
