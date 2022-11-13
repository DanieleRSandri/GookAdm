<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\ConsumoProduto;
use Illuminate\Http\Request;

class ConsumoController extends Controller
{

    public function index(){
        $consumos = Consumo::all();

        return view('consumos.index', ['consumos'=>$consumos]);
    }

    public function create(){
        return view('consumos.create');
    }

    public function store(Request $request){
        $consumo = Consumo::create([
                            'id_cliente' => $request->get('id_cliente'),
                            'valorTotal' => $request->get('valorTotal')
                        ]);

        $produtos = $request->produtos;
        foreach($produtos as $a => $value) {
            ConsumoProduto::create([
                            'id_consumo' => $consumo->id,
                            'id_produto' => $produtos[$a]
                        ]);
        }

        return redirect()->route('consumos');
    }
}
