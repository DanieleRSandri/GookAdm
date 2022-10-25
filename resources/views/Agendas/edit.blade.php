﻿@extends('adminlte::page')

@section('content')
    <h4>Editando Agendamento:</h4>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>"agendas/$agenda->id/update", 'method'=>'put']) !!}
    <div class="form-group">
        {!! Form::label('data', 'Data') !!}
        {!! Form::date('data', $agenda->data, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('horario', 'Horario') !!}
        {!! Form::text('horario', $agenda->horario, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status',
                            array('Disponivel'=>'Disponivel',
                                'Agendado'=> 'Agendado',
                                'Cancelado'=> 'Cancelado'),
                                $agenda->status,['class'=>'form-control', 'require']) !!}
        </div>


    <div class="form-group">
        {!! Form::label('id_quadra', 'Quadra:') !!}
        {!! Form::select('id_quadra',\App\Models\Quadra::orderBy('nome')->pluck('nome', 'id')->toArray(), $agenda->id_quadra ,['class' => 'form-control', 'required']) !!}
    </div>
 

    <div class="form-group">
        {!! Form::label('id_cliente', 'Cliente:') !!}
        {!! Form::select('id_quadra',\App\Models\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), $agenda->id_cliente ,['class' => 'form-control', 'required']) !!}
  
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Agendamento', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('agendas') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop