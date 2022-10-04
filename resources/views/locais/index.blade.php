@extends('adminlte::page')

@section('content')
<h4>Locais</h4>
<table class="table table-stripe table-bordered table-hover">
    <thead>
        <th>Nome</th>
        <th>Endereço</th>
    </thead>

    <tbody>
    @foreach($locais as $local) 
        <tr>
            <td>{{ $local->nome}}</td>
            <td>{{ $local->endereco}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="form-group" >
    <a class="btn btn-outline-primary" href="{{ route('locais.criar') }}">Novo Local</a>
    </div>

@stop