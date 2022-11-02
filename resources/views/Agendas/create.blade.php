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
        {!! Form::label('horario_inicio', 'Horario inicial:') !!}
        {!! Form::text('horario_inicio', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('horario_final', 'Horario Final:') !!}
        {!! Form::text('horario_final', null, ['class' => 'form-control', 'require']) !!}
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
        {!! Form::select('id_quadra',\App\Models\Quadra::orderBy('nome')->pluck('nome', 'id')->toArray(), null ,['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_cliente', 'Cliente:') !!}
        {!! Form::select('id_cliente',\App\Models\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), null ,['class' => 'form-control', 'placeholder' => 'Selecione um cliente']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Agendamento', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('agendas') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop
