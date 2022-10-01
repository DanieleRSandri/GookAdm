@extends('adminlte::page')

@section('content')
<h1>Produtos</h1>
<table class="table table-stripe table-bordered table-hover">
    <thead>
    <td><b>Descrição</td>
            <td><b>Preço Unitário</td>
            <td><b>Quantidade em Estoque</td>
    </thead>

    <tbody>
    @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->descricao}}</td>
            <td>{{ $produto->precoUnitario}}</td>
            <td>{{ $produto->quantidade}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop