@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Consumo de Clientes</h4>
</div>

<table class="table table-striped">
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

<div class="form-group"  style="text-align:center">
    <a class="btn btn-outline-primary" href="{{ route('consumoClientes.criar') }}">Novo Consumo</a>
    </div>

@stop