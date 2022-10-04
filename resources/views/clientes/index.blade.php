@extends('adminlte::page')

@section('content')
<h3>Listagem de Clientes</h3>
<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Nome</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Endereço</th>
    </thead>

    <tbody>
    @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nome}}</td>
            <td>{{ $cliente->cpf}}</td>
            <td>{{ $cliente->telefone}}</td>
            <td>{{ $cliente->endereco}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="form-group" >
    <a class="btn btn-outline-primary" href="{{ route('clientes.criar') }}">Novo Cliente</a>
    </div>

@stop