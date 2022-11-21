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
                </tr>
            </thead>

            <tbody>
                @foreach ($consumos as $consumo)
                    <tr>
                        <td>{{ $consumo->cliente->nome }}</td>
                        <td>{{ $consumo->valorTotal }}</td>
                        <td>
                            @foreach ($consumo->consumoProdutos as $a)
                                <li>{{ $a->produto->descricao }}</li>
                            @endforeach
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
