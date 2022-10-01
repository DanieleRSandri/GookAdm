<?php

namespace App\Http\Controllers;
use App\Models\Agenda;

use Illuminate\Http\Request;

class AgendasController extends Controller
{
    public function index(){
        $agendas = Agenda::All();
        return view('agendas.index', ['agendas'=>$agendas]);
    }

    public function create(){
        return view('agendas.create');
    }
}
