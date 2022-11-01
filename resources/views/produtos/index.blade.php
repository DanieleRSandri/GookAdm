@extends('layouts.default')

@section('content')
<div style="text-align:center">
    <h4>Listagem de Produtos</h4>
</div>

{!! Form::open(['name' => 'form_name', 'route' => 'produtos']) !!}
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
    <th>Descrição</th>
            <th>Preço Unitário</th>
            <th>Quantidade em Estoque</th>
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
                <a href="#" onclick="return ConfirmaExclusao({{ $produto->id }})"
                    class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="form-group"  style="text-align:center">
    <a class="btn btn-outline-primary" href="{{ route('produtos.create') }}">Novo Produto</a>
    </div>

@stop
@section('table-delete')
"produtos"
@stop
