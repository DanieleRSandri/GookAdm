<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;

class AgendasController extends Controller
{
    public function VerificaHoraria($data, $horaInicial, $horaFinal, $status, $id_quadra)
    {
        // dd($status);
        if ($status != 'Cancelado') {
            $horario = Agenda::where("data", $data)
                ->where('id_quadra', $id_quadra)
                ->where(function ($query) {
                    $query->where('status', 'Agendado')->orWhere('status', 'Disponivel');
                })
                ->whereBetween("horario_inicio", [$horaInicial, $horaFinal])
                ->whereBetween("horario_final", [$horaInicial, $horaFinal]);

            if ($horario->count() > 0) {
                return false;
            }
        } else {
            $horario = Agenda::where("data", $data)

                ->where(function ($query) {
                    $query->where('status', 'Cancelado');
                })->whereBetween("horario_inicio", [$horaInicial, $horaFinal])
                ->whereBetween("horario_final", [$horaInicial, $horaFinal]);

            if ($horario->count() > 0) {
                return false;
            }
        }
        return true;
    }

    public function index()
    {
        $agendas = Agenda::All();
        return view('agendas.index', ['agendas' => $agendas]);
    }

    public function create()
    {
        return view('agendas.create');
    }

    public function store(AgendaRequest $request)
    {
        $novo_agendamento = $request->all();

        if ($this->VerificaHoraria($novo_agendamento['data'], $novo_agendamento['horario_inicio'], $novo_agendamento['horario_final'], $novo_agendamento['status'], $novo_agendamento['id_quadra'])) :
            Agenda::create($novo_agendamento);
            return redirect('agendas');
        else :
            echo '<script> alert ("Ja existe um agendamento entre os horarios informados"); location.href=("http://127.0.0.1:8000/agendas/create")</script>';

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
        return view('agendas.edit', compact('agenda'));
    }

    public function update(AgendaRequest $request, $id)
    {
        $agendamento = $request->all();

        if ($this->VerificaHoraria($agendamento['data'], $agendamento['horario_inicio'], $agendamento['horario_final'], $agendamento['status'], $agendamento['id_quadra'])) :
            Agenda::find($id)->update($request->all());
            return redirect('agendas');
        else :
            echo '<script> alert ("Ja existe um agendamento entre os horarios informados");)</script>';

        endif;
    }
}
