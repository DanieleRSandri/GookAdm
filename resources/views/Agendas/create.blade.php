@extends('adminlte::page')

@section('content')
    <h4> Novo Agendamento</h4>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => 'agendas/store']) !!}
    <div class="form-group">
        {!! Form::label('data', 'Data') !!}
        {!! Form::date('data', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('horario', 'Horario') !!}
        {!! Form::text('horario', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select('status',
                            array('Disponivel'=>'Disponivel',
                                'Agendado'=> 'Agendado',
                                'Cancelado'=> 'Cancelado'),
                            'Disponivel',['class'=>'form-control', 'require']) !!}
        </div>


    <div class="form-group">
        {!! Form::label('id_quadra', 'Quadra:') !!}
        {!! Form::text('id_quadra', null, ['class' => 'form-control', 'require']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('id_cliente', 'Cliente:') !!}
        {!! Form::text('id_cliente', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Agendamento', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('agendas.listar') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop
