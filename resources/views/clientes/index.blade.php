@extends('adminlte::page')

@section('content')

    <div style="text-align:center">
        <h4>Listagem de Clientes</h4>
    </div>

    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group" style="text-align:center">
        <a class="btn btn-outline-primary" href="{{ route('clientes.criar') }}">Novo Cliente</a>
    </div>

@stop
