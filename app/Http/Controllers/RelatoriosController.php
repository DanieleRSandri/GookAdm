<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade\Pdf;
use Psy\Readline\Hoa\Console;

class RelatoriosController extends Controller
{
    public function agendamentosDiario()
    {
        $hoje = date("Y/m/d");
        // dd($hoje);
        $agendas = Agenda::where("data", $hoje)->get();

        if ($agendas->count() > 0) {
            $pdf = PDF::loadView('pdf/agenda', compact('agendas'));
            return $pdf->setPaper('a4')->download('Agendamentos.pdf');
        }
        return  '<script> alert ("Nenhuma informação encontrada!"); location.href=("http://127.0.0.1:8000/home")</script>';
    }

    public function agendamentosSemanal()
    {

        $sete = date("Y/m/d", strtotime(date("Y-m-d") . "-7days"));

        $hoje = date("Y/m/d");

        $agendas = Agenda::whereBetween("data", [$sete, $hoje])->orderBy("data")->get();

        if ($agendas->count() > 0) {
            $pdf = PDF::loadView('pdf/agenda', compact('agendas'));
            return $pdf->setPaper('a4')->download('Agendamentos.pdf');
        }
        return  '<script> alert ("Nenhuma informação encontrada!"); location.href=("http://127.0.0.1:8000/home")</script>';
    }

    public function agendamentosMensal()
    {

        $trinta = date("Y/m/d", strtotime(date("Y-m-d") . "-30days"));

        $hoje = date("Y/m/d");

        $agendas = Agenda::whereBetween("data", [$trinta, $hoje])->orderBy("data")->get();

        if ($agendas->count() > 0) {
            $pdf = PDF::loadView('pdf/agenda', compact('agendas'));
            return $pdf->setPaper('a4')->download('Agendamentos.pdf');
        }
        return  '<script> alert ("Nenhuma informação encontrada!"); location.href=("http://127.0.0.1:8000/home")</script>';
    }

    public function cliente()
    {
        $clientes = Cliente::orderBy('nome')->get();

        $pdf = PDF::loadView('pdf/cliente', compact('clientes'));
        return $pdf->setPaper('a4')->download('Clientes.pdf');
    }
}
