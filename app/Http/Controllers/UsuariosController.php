<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UsuariosController extends Controller
{
    public function index(Request $filtro)
    {
        $filtragem = $filtro->get('desc_filtro');

        if ($filtragem == null)
            $usuarios = User::orderBy('name')->paginate(5);
        else
            $usuarios = User::where('name', 'like', '%' . $filtragem . '%')->orderBy("name")->paginate(5);
        return view('usuarios.index', ['usuarios' => $usuarios, 'filtro' => $filtro->get('desc_filtro')]);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(UserRequest $request)
    {
        $novo_user = $request->all();

        $novo_user['password'] = bcrypt($novo_user['password']);
        User::create($novo_user);

        return redirect('usuarios');
    }

    public function destroy($id)
    {
        try {
            User::find($id)->delete();
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
        $user = User::find(Crypt::decrypt($request->get('id')));
        return view('usuarios.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        User::find($id)->update($request->all());
        return redirect('usuarios');
    }
}
