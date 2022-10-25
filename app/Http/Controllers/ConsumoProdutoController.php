<?php

namespace App\Http\Controllers;

use App\Models\ConsumoProduto;
use App\Http\Requests\ConsumoProdutoRequest;

class ConsumoProdutoController extends Controller
{
    public function index(){
        $consumoProdutos = ConsumoProduto::All();
        return view('consumoProduto.index', ['consumoProduto'=>$consumoProdutos]);
    }
   

    public function create(){
        return view('consumoProduto.create');
    }

    public function store(ConsumoProdutoRequest $request){
        $consumoProdutos = $request->all();
        ConsumoProduto::create($consumoProdutos);

        return redirect('consumoProdutos');
    }

    public function destroy($id){
        ConsumoProduto::find($id)->delete();
        return redirect('consumoProdutos');
    }

    public function edit($id){
        $consumoProdutos = ConsumoProduto::find($id);
        return view('consumoProduto.edit', compact('consumoProdutos'));
    }
    
    public function update(ConsumoProdutoRequest $request, $id){
        ConsumoProduto::find($id)->update($request->all());
        return redirect('consumoProdutos');
    }
}