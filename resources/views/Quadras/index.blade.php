@extends('adminlte::page')

@section('content')
<h3>Listagem de Quadras</h3>
<table class="table table-stripe table-bordered table-hover">
    <thead>
    <th>Nome</th>
            <th>Tipo</th>
            <th>Tempo de Partida</th>
            <th>Valor do Tempo</th>
            <th>Local</th>
    </thead>

    <tbody>
    @foreach($quadras as $quadra)
        <tr>
            <td>{{ $quadra->nome}}</td>
            <td>{{ $quadra->tipo}}</td>
            <td>{{ $quadra->tempoPartida}}</td>
            <td>{{ $quadra->valorTempo}}</td>
            <td>{{ $quadra->id_local}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@stop
