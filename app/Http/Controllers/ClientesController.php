<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index(){
        $clientes = Cliente::All();
        return view('clientes', ['clientes'=>$clientes]);
    }
}
