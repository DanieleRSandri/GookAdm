<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\ConsumoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ConsumoController extends Controller
{

    public function index()
    {
        $consumos = Consumo::all();

        return view('consumos.index', ['consumos' => $consumos]);
    }

    public function create()
    {
        return view('consumos.create');
    }

    public function store(Request $request)
    {
        $consumo = Consumo::create([
            'id_cliente' => $request->get('id_cliente'),
            'valorTotal' => $request->get('valorTotal')
        ]);

        $produtos = $request->produtos;
        foreach ($produtos as $a => $value) {
            ConsumoProduto::create([
                'id_consumo' => $consumo->id,
                'id_produto' => $produtos[$a]
            ]);
        }

        return redirect()->route('consumos');
    }


    public function edit(Request $request)
    {
        $consumo = Consumo::find(Crypt::decrypt($request->get('id')));
        return view('consumos.edit', compact('consumo'));
    }

      public function update(Request $request, $id)
    {
        Consumo::find($id)->update($request->all());
        return redirect('consumos');
    }

    public function destroy($id)
    {
        try {
            ConsumoProduto::where('id_consumo',  $id)->delete();
            Consumo::find($id)->delete();

            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException  $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }
}
