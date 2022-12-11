@extends('adminlte::page')

@section('content')

    <br>


    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => 'relatorios/agendamentos']) !!}


    <div class="row">
        <div class="col-lg-6 col-6">

            <div class="form-group">

                {!! Form::label('data_inicial', 'Data inicial:') !!}
                {!! Form::date('data_inicial', null, ['class' => 'form-control', 'require']) !!}



            </div>
        </div>

        <div class="col-lg-6 col-6">
            <div class="form-group">
                {!! Form::label('data_Final', 'Data Final:') !!}
                {!! Form::date('data_Final', null, ['class' => 'form-control', 'require']) !!}
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select(
            'status',
            [
                'Todos' => 'Todos',
                'Disponível' => 'Disponível',
                'Reservado' => 'Reservado',
                'Cancelado' => 'Cancelado',
                'Não Compareceu' => 'Não Compareceu',
                'Não Utilizado' => 'Não Utilizado',
                'Utilizado' => 'Utilizado',
            ],
            'Todos',
            ['class' => 'form-control', 'require'],
        ) !!}
    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Gerar Relatório', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
    </div>

    {!! Form::close() !!}

@stop
