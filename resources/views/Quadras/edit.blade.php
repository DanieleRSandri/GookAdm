@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Editando Quadra: {{ $quadra->descricao }}</h4>
</div> 
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>"quadras/$quadra->id/update", 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $quadra->nome, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo', 'Tipo Quadra:') !!}
        {!! Form::text('tipo', $quadra->tipo, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tempoPartida', 'Tempo Partida:') !!}
        {!! Form::text('tempoPartida', $quadra->tempoPartida, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorTempo', 'Valor Tempo:') !!}
        {!! Form::text('valorTempo', $quadra->valorTempo, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_local', 'Local:') !!}
        {!! Form::text('id_local', $quadra->id_local, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Quadra', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('quadras') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
