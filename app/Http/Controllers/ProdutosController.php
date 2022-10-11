<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        $produtos = Produto::All();
        return view('produtos.index', ['produtos'=>$produtos]);
    }

    public function create(){
        return view('produtos.create');
    }

    public function store(ProdutoRequest $request){
        $novo_produto = $request->all();
        Produto::create($novo_produto);

        return redirect('produtos');
    }

    public function destroy($id){
        Produto::find($id)->delete();
        return redirect('produtos');
    }

    public function edit($id){
        $produto = Produto::find($id);
        return view('produtos.edit', compact('produto'));
    }
    
    public function update(ProdutoRequest $request, $id){
        Produto::find($id)->update($request->all());
        return redirect('produtos');
    }
}
