@extends('adminlte::page')

@section('content')
<h3>Listagem de Agendamentos</h3>
<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Data</th>
        <th>Horário</th>
        <th>Status</th>
        <th>Quadra</th>
        <th>Cliente</th>
        <th>Ações</th>
    </thead>

    <tbody>
    @foreach($agendas as $agendamento)
        <tr>
            <td>{{ Carbon\Carbon::parse($agendamento->data)->format('d-m-Y') }}</td>
            <td>{{ Carbon\Carbon::parse($agendamento->horario)->format('h:i') }}</td>
            <td>{{ $agendamento->status}}</td>
            <td>{{ $agendamento->quadra->nome }}</td>
            <td>{{ $agendamento->cliente->nome}}</td>


            
            <td>
                <a href="{{ route('agendas.edit', ['id' => $agendamento->id]) }}"
                    class="btn btn-outline-success">Editar</a>
                    <a href="{{ route('agendas.destroy', ['id' => $agendamento->id]) }}"
                    class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

<div class="form-group" style="text-align:center" >
    <a class="btn btn-outline-primary" href="{{ route('agendas.create') }}">Novo Agendamento</a>
    </div>

@stop
