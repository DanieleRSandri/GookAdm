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
            <td>{{ $consumo->cliente->nome}}</td>
            <td>
                <a href="{{ route('consumoClientes.edit', ['id' => $consumo->id]) }}"
                    class="btn btn-outline-success">Editar</a>
                    <a href="{{ route('consumoClientes.destroy', ['id' => $consumo->id]) }}"
                    class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="form-group"  style="text-align:center">
    <a class="btn btn-outline-primary" href="{{ route('consumoClientes.create') }}">Novo Consumo</a>
    </div>

@stop