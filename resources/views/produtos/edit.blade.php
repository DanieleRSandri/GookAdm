@extends('adminlte::page')

@section('content')
    <div style="text-align:center">
        <h4>Editando Produto: {{ $produto->descricao }}</h4>
    </div>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => "produtos/$produto->id/update", 'method' => 'put']) !!}

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição') !!}
        {!! Form::text('descricao', $produto->descricao, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('precoUnitario', 'Preço Unitário:') !!}
        {!! Form::text('precoUnitario', $produto->precoUnitario, ['class' => 'form-control', 'require']) !!}
    </div>


    <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Produto', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('produtos') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop
