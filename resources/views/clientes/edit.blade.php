@extends('adminlte::page')

@section('content')
    <div style="text-align:center">
        <h4>Editando Cliente: {{ $cliente->nome }}</h4>
    </div>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => "clientes/$cliente->id/update", 'method' => 'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $cliente->nome, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cpf', 'Cpf:') !!}
        {!! Form::text('cpf', $cliente->cpf, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', $cliente->endereco, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', $cliente->telefone, ['class' => 'form-control', 'require']) !!}
    </div>
    <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Cliente', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('clientes') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
