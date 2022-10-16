@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Nova Quadra</h4>
</div> 
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
        {!! Form::select('id_local',\App\Models\Locais::orderBy('nome')->pluck('nome', 'id')->toArray(), null ,['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Quadra', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('quadras') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
