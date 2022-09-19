<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::All();
        return view('usuarios', ['usuarios'=>$usuarios]);
    }
}
