@extends('adminlte::page')

@section('content')
    <h4> Nova Quadra</h4>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => 'quadras/store']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo', 'Tipo Quadra:') !!}
        {!! Form::text('tipo', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tempoPartida', 'Tempo Partida:') !!}
        {!! Form::text('tempoPartida', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorTempo', 'Valor Tempo:') !!}
        {!! Form::text('valorTempo', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_local', 'Local:') !!}
        {!! Form::text('id_local', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Quadra', ['class' => 'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-default']) !!}
        <a class="btn btn-outline-danger" href="{{ route('quadras.listar') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop
