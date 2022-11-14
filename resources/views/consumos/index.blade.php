@extends('layouts.default')

@section('content')
    <div class="container-fluid">
        <h3>Consumo</h3>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Valor Total</th>
                    <th>Produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consumos as $consumo)
                    <tr>
                        <td>{{ $consumo->cliente->nome }}</td>
                        <td>{{ $consumo->valorTotal }}</td>
                        <td>
                            @foreach ($consumo->consumoProdutos as $a)
                                <li>{{ $a->consumo->descricao }}</li>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('consumos.edit', ['id' => Crypt::encrypt($consumo->id)]) }}"
                                class="btn btn-outline-success">Editar</a>
                            <a href="#" onclick="return ConfirmaExclusao({{ $consumo->id }})"
                                class="btn btn-outline-danger">Remover</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group" style="text-align:center">
            <a class="btn btn-outline-primary" href="{{ route('consumos.create') }}">Novo Consumo</a>
        </div>

    </div>
@stop
