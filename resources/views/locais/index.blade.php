@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Listagem de Locais</h4>
</div>

<table class="table table-striped">
    <thead>
        <th>Nome</th>
        <th>Endereço</th>
        <th>Ações</th>
    </thead>

    <tbody>
    @foreach($locais as $local) 
        <tr>
            <td>{{ $local->nome}}</td>
            <td>{{ $local->endereco}}</td>
            <td>
                <a href="{{ route('locais.edit', ['id'=>$local->id]) }}" class="btn btn-outline-success">Editar</a>
                <a href="{{ route('locais.destroy', ['id'=>$local->id]) }}" class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="form-group"  style="text-align:center">
    <a class="btn btn-outline-primary" href="{{ route('locais.create') }}">Novo Local</a>
    </div>

@stop