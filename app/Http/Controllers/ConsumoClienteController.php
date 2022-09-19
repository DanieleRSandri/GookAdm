<?php

namespace App\Http\Controllers;
use App\Models\ConsumoCliente;

use Illuminate\Http\Request;

class ConsumoClienteController extends Controller
{
    public function index(){
        $consumoClientes = ConsumoCliente::All();
        return view('consumoCliente', ['consumoCliente'=>$consumoClientes]);
    }
}
