<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Cliente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class RelatoriosController extends Controller
{
    public function index()
    {
        return view('relatorio.index');
    }


    public function agendamentos(Request $request)
    {
        $data_inicial = $request->get('data_inicial');
        $data_Final = $request->get('data_Final');
        $status = $request->get('status');


        if (strtotime($data_inicial) > strtotime($data_Final))

            return back()->withErrors(['error' => ['A data inicial é maior que a data final!']]);

        else

            if ($status == 'Todos')
            $agendas = Agenda::whereIn("status", ['Disponível', 'Reservado', 'Cancelado', 'Não Compareceu','Não Utilizado'])
                ->whereBetween("data", [$data_inicial, $data_Final])->orderBy('data')->orderBy('status')->get();
        else
            $agendas = Agenda::where("status", $status)
                ->whereBetween("data", [$data_inicial, $data_Final])->orderBy('data')->get();


        // dd($agendas->count());
        if ($agendas->count() > 0) {

            $pdf = PDF::loadView('pdf/agenda', compact('agendas'));
            // return $pdf->setPaper('a4', 'landscape')->stream('Agendamentos.pdf');
            return $pdf->setPaper('a4', 'landscape')->download('Agendamentos.pdf');
        }
        return back()->withErrors(['error' => ['Nenhuma agendamento encontado!!']]);
    }

    public function cliente()
    {
        $clientes = Cliente::orderBy('nome')->get();

        if ($clientes->count() > 0) {
            $pdf = PDF::loadView('pdf/cliente', compact('clientes'));
            return $pdf->setPaper('a4', 'landscape')->download('Clientes.pdf');
        }
        return '<script>alert("Nenhuma informação encontrada!!");window.location= "/home";</script>';
    }
}
