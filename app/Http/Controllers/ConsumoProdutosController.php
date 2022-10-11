<?php

namespace App\Http\Controllers;

use App\Models\ConsumoProduto;
use App\Http\Requests\ConsumoProdutoRequest;
use Illuminate\Http\Request;

class ConsumoProdutosController extends Controller
{
    public function index(){
        $consumoProdutos = ConsumoProduto::All();
        return view('consumoProduto.index', ['consumoProduto'=>$consumoProdutos]);
    }

    
    public function create(){
        return view('consumoProduto.create');
    }

    public function store(ConsumoProdutoRequest $request){
        $novo_consumoProdutos = $request->all();
        ConsumoProduto::create($novo_consumoProdutos);

        return redirect('consumoProduto');
    }

    public function destroy($id){
        ConsumoProduto::find($id)->delete();
        return redirect('consumoProduto');
    }

    public function edit($id){
        $consumoProdutos = ConsumoProduto::find($id);
        return view('consumoProduto.edit', compact('consumoProduto'));
    }
    
    public function update(ConsumoProdutoRequest $request, $id){
        ConsumoProduto::find($id)->update($request->all());
        return redirect('consumoProduto');
    }
}
