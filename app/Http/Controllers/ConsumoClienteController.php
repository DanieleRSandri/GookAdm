<?php

namespace App\Http\Controllers;
use App\Models\ConsumoClientes;
use App\Http\Requests\ConsumoClienteRequest;

use Illuminate\Http\Request;

class ConsumoClienteController extends Controller
{
    public function index(){
        $consumoClientes = ConsumoClientes::All();
        return view('consumoCliente.index', ['consumoCliente'=>$consumoClientes]);
    }

    public function create(){
        return view('consumoCliente.create');
    }

    public function store(ConsumoClienteRequest $request){
        $novo_consumoProdutos = $request->all();
        ConsumoClientes::create($novo_consumoProdutos);

        return redirect('consumoClientes');
    }

    public function destroy($id){
        ConsumoClientes::find($id)->delete();
        return redirect('consumoClientes');
    }

    public function edit($id){
        $consumoClientes = ConsumoClientes::find($id);
        return view('consumoClientes.edit', compact('consumoClientes'));
    }
    
    public function update(ConsumoClienteRequest $request, $id){
        ConsumoClientes::find($id)->update($request->all());
        return redirect('consumoClientes');
    }
}
