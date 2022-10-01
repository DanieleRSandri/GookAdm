@extends('adminlte::page')

@section('content')
<h3>Listagem de Consumo Produtos</h3>
<table class="table table-stripe table-bordered table-hover">
    <thead>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Consumo</th>
    </thead>

    <tbody>
    @foreach($consumoProduto as $consumo)
        <tr>
            <td>{{ $consumo->id_produto}}</td>
            <td>{{ $consumo->quantidade}}</td>
            <td>{{ $consumo->id_consumo}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop

