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
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}"
                            class="btn btn-outline-success">Editar</a>
                            <a href="{{ route('clientes.destroy', ['id' => $cliente->id]) }}"
                            class="btn btn-outline-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links("pagination::bootstrap-4") }}
    <div class="form-group" style="text-align:center">
        <a class="btn btn-outline-primary" href="{{ route('clientes.create') }}">Novo Cliente</a>
    </div>

@stop
