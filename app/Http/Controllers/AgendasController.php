<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use Barryvdh\DomPDF\Facade\Pdf;

class AgendasController extends Controller
{
   
    public function geraPdf(){
         $agendas = Agenda::All();
        //  dd($agendas);
         
        $pdf = PDF::loadView('pdf/agenda',compact('agendas'));
     return $pdf->setPaper('a4')->download('Lista_Agendamento.pdf');
      }
    
    public function VerificaHoraria($data, $horaInicial, $horaFinal) {
        $horario = Agenda::where("data", $data)->where('status', 'Agendado')->orWhere('status', 'Disponivel');
        $valida =  $horario->whereBetween("horario_inicio", [$horaInicial, $horaFinal])->get();

        if ($valida->count() > 0) {
            return false;
        }
        
        $valida = $horario->whereBetween("horario_final", [$horaInicial, $horaFinal])->get();
        if ($valida->count() > 0) {
            return false;
        }

        return true;
    }


    // public function index()
    // {
    //     $agendas = Agenda::select(Agenda::raw("*"))->get();
    //     return view('agendas.index', ['agendas' => $agendas]);
    // }

     public function index(){
        $agendas = Agenda::All();
        return view('agendas.index', ['agendas'=>$agendas]);
    }

    public function create(){
        return view('agendas.create');
    }

    public function store(AgendaRequest $request){
        $novo_agendamento = $request->all();

       // if ($this->VerificaHoraria($novo_agendamento['data'], $novo_agendamento['horario_inicio'], $novo_agendamento['horario_final']))
            Agenda::create($novo_agendamento);
            return redirect('agendas');
    }

    public function destroy($id){
        Agenda::find($id)->delete();
        return redirect('agendas');
    }

    public function edit($id){
        $agenda = Agenda::find($id);
        return view('agendas.edit', compact('agenda'));
    }
    
    public function update(AgendaRequest $request, $id){
        $agendamento = $request->all();

        if ($this->VerificaHoraria($agendamento['data'], $agendamento['horario_inicio'], $agendamento['horario_final']))
            Agenda::find($id)->update($request->all());
        return redirect('agendas');
    }
}
