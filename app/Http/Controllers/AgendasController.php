<?php

namespace App\Http\Controllers;
use App\Models\Agenda;

use Illuminate\Http\Request;

class AgendasController extends Controller
{
    public function index(){
        $agendas = Agenda::All();
        return view('agendas', ['agendas'=>$agendas]);
    }
}
