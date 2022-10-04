<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
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

    public function store(AgendaRequest $request){
        $novo_agendamento = $request->all();
        Agenda::create($novo_agendamento);

        return redirect('agendas');
    }
}
