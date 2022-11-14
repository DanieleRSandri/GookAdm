<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuadraRequest;
use App\Models\Quadra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QuadrasController extends Controller
{

    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');

        if ($filtragem == null)
            $quadras = Quadra::orderBy('nome')->paginate(5);
        else
            $quadras = Quadra::where('nome', 'like', '%' . $filtragem . '%')->orderBy("nome")->paginate(5);
        return view('quadras.index', ['quadras' => $quadras, 'filtro' => $filtro->get('desc_filtro')]);
    }

    public function create()
    {
        return view('quadras.create');
    }

    public function store(QuadraRequest $request)
    {
        $novo_quadra = $request->all();
        Quadra::create($novo_quadra);

        return redirect('quadras');
    }

    public function destroy($id)
    {
        try {
            Quadra::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit(Request $request)
    {
        $quadra = Quadra::find(Crypt::decrypt($request->get('id')));
        return view('quadras.edit', compact('quadra'));
    }

    public function update(QuadraRequest $request, $id)
    {
        Quadra::find($id)->update($request->all());
        return redirect('quadras');
    }
}
