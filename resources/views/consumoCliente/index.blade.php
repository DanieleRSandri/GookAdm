@extends('adminlte::page')

@section('content')
<h3>Listagem de consumo de Clientes</h3>
<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Valor Total</th>
        <th>Cliente</th>
    </thead>

    <tbody>
    @foreach($consumoCliente as $consumo)
        <tr>
            <td>{{ $consumo->valorTotal}}</td>
            <td>{{ $consumo->id_cliente}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop