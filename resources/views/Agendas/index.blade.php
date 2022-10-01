@extends('adminlte::page')

@section('content')
<h3>Listagem de Clientes</h3>
<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Data</th>
        <th>Horário</th>
        <th>Status</th>
        <th>Quadra</th>
        <th>Cliente</th>
    </thead>

    <tbody>
    @foreach($agendas as $agendamento)
        <tr>
            <td>{{ $agendamento->data}}</td>
            <td>{{ $agendamento->horario}}</td>
            <td>{{ $agendamento->status}}</td>
            <td>{{ $agendamento->id_quadra}}</td>
            <td>{{ $agendamento->id_cliente}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@stop
