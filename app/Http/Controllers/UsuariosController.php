<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\UserRequest;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = User::All();
        return view('usuarios.index', ['usuarios'=>$usuarios]);
    }
    
    public function create(){
        return view('usuarios.create');
    }

    public function store(UserRequest $request){
        $novo_user= $request->all();
        User::create($novo_user);

        return redirect('usuarios');
    }

    public function destroy($id){
        User::find($id)->delete();
        return redirect('usuarios');
    }

    public function edit($id){
        $user = User::find($id);
        return view('usuarios.edit', compact('user'));
    }
    
    public function update(UserRequest $request, $id){
        User::find($id)->update($request->all());
        return redirect('usuarios');
    }

}
