@extends('layouts.default')
@section('content')

    <div style="text-align:center">
        <h4>Listagem de Clientes</h4>
    </div>

    {!! Form::open(['name' => 'form_name', 'route' => 'clientes']) !!}
    <div calss="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;"
                placeholder="Pesquisa...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default"><i
                        class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
    {!! Form::close() !!}
    <br>

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
                            <a href="#" onclick="return ConfirmaExclusao({{ $cliente->id }})"
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

@section('table-delete')
"clientes"
@stop

