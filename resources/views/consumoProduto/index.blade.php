@extends('layouts.default')


@section('content')
<div style="text-align:center">
    <h4>Consumo de Produtos</h4>
</div>

<table class="table table-striped">
    <thead>
        <th>Quantidade</th>
        <th>Produto</th>
        <th>Consumo</th>
        <th>Ações</th>
    </thead>

    <tbody>
    @foreach($consumoProduto as $consumo)
        <tr>
            <td>{{ $consumo->quantidade}}</td>
            <td>{{ $consumo->produto->descricao}}</td>
            <td>{{ $consumo->consumo->id}}</td>
            <td>
                <a href="{{ route('consumoProdutos.edit', ['id' => $consumo->id]) }}"
                    class="btn btn-outline-success">Editar</a>
                    <a href="#" onclick="return ConfirmaExclusao({{ $consumo->id }})"
                        class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="form-group"  style="text-align:center">
    <a class="btn btn-outline-primary" href="{{ route('consumoProdutos.create') }}">Novo Consumo</a>
    </div>

@stop

@section('table-delete')
"consumoProdutos"
@stop