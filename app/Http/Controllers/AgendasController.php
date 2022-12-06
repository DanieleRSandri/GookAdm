<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use Carbon\Carbon;

class AgendasController extends Controller
{
    public function VerificaHorario($data, $horaInicial, $horaFinal, $status, $id_quadra)
    {
        if ($status != 'Cancelado' || $status != 'Não Utilizado' ) {
            $horario = Agenda::where("data", $data)
                ->where('id_quadra', $id_quadra)
                ->where(function ($query) {
                    $query->where('status', 'Reservado')->orWhere('status', 'Disponível');
                })
                ->whereBetween("horario_inicio", [$horaInicial, $horaFinal])
                ->whereBetween("horario_final", [$horaInicial, $horaFinal]);

            if ($horario->count() > 0) {
                return false;
            }
        } else {
            $horario = Agenda::where("data", $data)

                ->where(function ($query) {
                    $query->where('status', 'Cancelado')->orWhere('status', 'Não Utilizado');
                })->whereBetween("horario_inicio", [$horaInicial, $horaFinal])
                ->whereBetween("horario_final", [$horaInicial, $horaFinal]);

            if ($horario->count() > 0) {
                return false;
            }
        }
        return true;
    }

    public function VerificaHorarioAgendado($data, $horaInicial, $horaFinal, $status, $id_quadra, $id)
    {
        $agenda = Agenda::where("id", $id)
            ->where('id_quadra', $id_quadra)
            ->where("horario_inicio", $horaInicial)
            ->where("horario_final", $horaFinal);

        if ($agenda->count() === 0) {
            if ($status != 'Cancelado' || $status != 'Não Utilizado' ) {
                $horario = Agenda::where("data", $data)
                    ->where('id_quadra', $id_quadra)
                    ->where(function ($query) {
                        $query->where('status', 'Reservado')->orWhere('status', 'Disponível');
                    })
                    ->whereBetween("horario_inicio", [$horaInicial, $horaFinal])
                    ->whereBetween("horario_final", [$horaInicial, $horaFinal]);

                if ($horario->count() > 0) {
                    return false;
                }
            } else {
                $horario = Agenda::where("data", $data)
                    ->where(function ($query) {
                        $query->where('status', 'Cancelado')->orWhere('status', 'Não Utilizado');
                    })->whereBetween("horario_inicio", [$horaInicial, $horaFinal])
                    ->whereBetween("horario_final", [$horaInicial, $horaFinal]);

                if ($horario->count() > 0) {
                    return false;
                }
            }
        }
        return true;
    }

    public function index()
    {
        $agendas = Agenda::All();
        return view('agendas.index', ['agendas' => $agendas]);
    }

    public function create($dataAgenda)
    {
        $data =  Carbon::parse($dataAgenda)->format('d-m-Y');
        $horario_inicio =  Carbon::parse($dataAgenda)->format('H:i');
        $horario_final =  gmdate('H:i', strtotime($horario_inicio) + strtotime('01:00'));

        return view('agendas.create', ['data' =>  $data, 'horario_inicio' =>  $horario_inicio, 'horario_final' =>  $horario_final]);
    }

    public function store(AgendaRequest $request)
    {
        $request['data'] = Carbon::parse($request['data'])->format('Y-m-d');
        $novo_agendamento = $request->all();

        if ($this->VerificaHorario(
            $novo_agendamento['data'],
            $novo_agendamento['horario_inicio'],
            $novo_agendamento['horario_final'],
            $novo_agendamento['status'],
            $novo_agendamento['id_quadra']
        )) :
            Agenda::create($novo_agendamento);
            return redirect('agendas');
        else :
            return redirect()->route('agendas.create', ['id' => $request->id, 'data' => $request->data, 'horario_inicio' => $request->horario_inicio, 'horario_final' => $request->horario_final])
                ->withErrors(['error' => 'Já existe um agendamento entre os horários informados.']);
        endif;
    }

    public function destroy($id)
    {
        try {
            Agenda::find($id)->delete();
            $ret = array('status' => 200, 'msg' => "null");
        } catch (\Illuminate\Database\QueryException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        } catch (\PDOException $e) {
            $ret = array('status' => 500, 'msg' => $e->getMessage());
        }
        return $ret;
    }

    public function edit($id)
    {
        $agenda = Agenda::find($id);
        $agenda['data']= Carbon::parse( $agenda['data'])->format('d-m-Y');
 
        return view('agendas.edit', compact('agenda'));
    }

    public function update(AgendaRequest $request, $id)
    {
        $request['data'] = Carbon::parse($request['data'])->format('Y-m-d');
        $agendamento = $request->all();
      
        if ($this->VerificaHorarioAgendado(
            $agendamento['data'],
            $agendamento['horario_inicio'],
            $agendamento['horario_final'],
            $agendamento['status'],
            $agendamento['id_quadra'],
            $id
        )) :
            Agenda::find($id)->update($request->all());
            return redirect('agendas');
        else :
            return redirect()->route('agendas.edit', ['id' => $request->id, 'data' => $request->data, 'horario_inicio' => $request->horario_inicio, 'horario_final' => $request->horario_final])
                ->withErrors(['error' => 'Já existe um agendamento entre os horários informados.']);
        endif;
    }
}
