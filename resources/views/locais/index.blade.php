@extends('adminlte::page')

@section('content')
<h1>Locais</h1>
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

@stop