<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Quadra;
use App\Models\Cliente;
use App\Models\Agenda;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $agendas = Agenda::all();
        $clientes = Cliente::all();
        $quadras = Quadra::all();
        $usuarios = User::all();
        return view('home', ['agendas' => $agendas, 'clientes' => $clientes, 'quadras' => $quadras, 'usuarios' => $usuarios]);
    }
}
