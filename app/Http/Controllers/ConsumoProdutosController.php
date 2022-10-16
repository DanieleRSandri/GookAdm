<?php

namespace App\Http\Controllers;

use App\Models\ConsumoProdutos;
use App\Http\Requests\ConsumoProdutoRequest;
use Illuminate\Http\Request;

class ConsumoProdutosController extends Controller
{
    public function index(){
        $consumoProdutos = ConsumoProdutos::All();
        return view('consumoProduto.index', ['consumoProduto'=>$consumoProdutos]);
    }

    
    public function create(){
        return view('consumoProduto.create');
    }

    public function store(ConsumoProdutoRequest $request){
        $novo_consumoProdutos = $request->all();
        ConsumoProdutos::create($novo_consumoProdutos);

        return redirect('consumoProduto');
    }

    public function destroy($id){
        ConsumoProdutos::find($id)->delete();
        return redirect('consumoProduto');
    }

    public function edit($id){
        $consumoProdutos = ConsumoProdutos::find($id);
        return view('consumoProduto.edit', compact('consumoProduto'));
    }
    
    public function update(ConsumoProdutoRequest $request, $id){
        ConsumoProdutos::find($id)->update($request->all());
        return redirect('consumoProduto');
    }
}
