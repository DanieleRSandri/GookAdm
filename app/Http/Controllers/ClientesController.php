<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ClientesController extends Controller
{
    function validaCPF($cpf)
    {

        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');

        if ($filtragem == null)
            $clientes = Cliente::orderBy('nome')->paginate(5);
        else
            $clientes = Cliente::where('nome', 'like', '%' . $filtragem . '%')->orderBy("nome")->paginate(5);
        return view('clientes.index', ['clientes' => $clientes, 'filtro' => $filtro->get('desc_filtro')]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request)
    {

        try {
            $novo_cliente = $request->all();
            Cliente::create($novo_cliente);
    
            return redirect('clientes');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('clientes.create', ['nome' => $request->nome, 'cpf' => $request->cpf, 'endereco' => $request->endereco, 'telefone' => $request->telefone])
            ->withErrors(['error' => 'Cliente já cadastrado com esse CPF.']);

        } catch (\PDOException $e) {
            return redirect()->route('clientes.create', ['nome' => $request->nome, 'cpf' => $request->cpf, 'endereco' => $request->endereco, 'telefone' => $request->telefone])
            ->withErrors(['error' => 'Cliente já cadastrado com esse CPF.']);
 
        }     
    }

    public function destroy($id)
    {
        try {
            Cliente::find($id)->delete();
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
        $cliente = Cliente::find(Crypt::decrypt($request->get('id')));
        return view('clientes.edit', compact('cliente'));
    }

    public function update(ClienteRequest $request, $id)
    {
        Cliente::find($id)->update($request->all());
        return redirect('clientes');
    }
}
