<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocalRequest;
use App\Models\Locais;
use Illuminate\Http\Request;


class LocaisController extends Controller
{
    function validar_cnpj($cnpj)
{
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;

	// Verifica se todos os digitos são iguais
	if (preg_match('/(\d)\1{13}/', $cnpj))
		return false;	

	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
		return false;

	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj[$i] * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}

	$resto = $soma % 11;

	return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
}


    public function index()
    {
        $locais = Locais::All();
        return view('locais.index', ['locais' => $locais]);
    }

    public function create()
    {
        return view('locais.create');
    }

    public function store(LocalRequest $request)
    {
        $novo_local = $request->all();
        if ($this->validar_cnpj($novo_local['cnpj'])) :
            Locais::create($novo_local);
            return redirect()->route('locais');
        else :

            return redirect()->route('locais.create', ['id' => $request->id])
                ->withErrors(['error' => 'CNPJ invalido.']);

        endif;
    }

    public function destroy($id)
    {
        try {
            Locais::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit($id)
    {
        $local = Locais::find($id);
        return view('locais.edit', compact('local'));
    }

    public function update(LocalRequest $request, $id)
    {

        if ($this->validar_cnpj($request['cnpj'])) :
            Locais::find($id)->update($request->all());
            return redirect()->route('locais');
        else :

            return redirect()->route('locais.edit', ['id' => $request->id])
                ->withErrors(['error' => 'CNPJ invalido.']);

        endif;
    }
}
