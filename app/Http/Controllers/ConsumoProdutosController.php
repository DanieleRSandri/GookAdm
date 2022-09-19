<?php

namespace App\Http\Controllers;

use App\Models\ConsumoProduto;
use Illuminate\Http\Request;

class ConsumoProdutosController extends Controller
{
    public function index(){
        $consumoProdutos = ConsumoProduto::All();
        return view('consumoProduto', ['consumoProduto'=>$consumoProdutos]);
    }
}
