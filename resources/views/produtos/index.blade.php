@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Listagem de Produtos</h4>
</div>

<table class="table table-striped">
    <thead>
    <td><b>Descrição</td>
            <td>Preço Unitário</td>
            <td>Quantidade em Estoque</td>
                <th>Ações</th>
    </thead>

    <tbody>
    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->descricao}}</td>
            <td>{{ $produto->precoUnitario}}</td>
            <td>{{ $produto->quantidade}}</td>
            <td>
                <a href="{{ route('produtos.edit', ['id'=>$produto->id]) }}" class="btn btn-outline-success">Editar</a>
                <a href="{{ route('produtos.destroy', ['id'=>$produto->id]) }}" class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="form-group"  style="text-align:center">
    <a class="btn btn-outline-primary" href="{{ route('produtos.create') }}">Novo Produto</a>
    </div>

@stop