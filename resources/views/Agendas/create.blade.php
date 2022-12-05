@extends('adminlte::page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready(function($) {
        $('#horario_inicio').mask('00:00');
        $('#horario_final').mask('00:00');
        $('#data').mask('00-00-0000');
    });
</script>

@section('content')
    <br>

    <h4 style="text-align:center"> Novo Agendamento</h4>

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
        {!! Form::text('data', $data, ['class' => 'form-control', 'require','id' => 'data']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status') !!}
        {!! Form::select(
            'status',
            [
                'Disponível' => 'Disponível',
                'Reservado' => 'Reservado',
                'Cancelado' => 'Cancelado',
                'Não Compareceu' => 'Não Compareceu',
            ],
            'Disponível',
            ['class' => 'form-control', 'require'],
        ) !!}
    </div>

    <div class="row">
        <div class="col-lg-6 col-6">

            <div class="form-group">
                {!! Form::label('id_cliente', 'Cliente:') !!}
                {!! Form::select(
                    'id_cliente',
                    \App\Models\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(),
                    null,
                    ['class' => 'form-control', 'placeholder' => 'Selecione um cliente'],
                ) !!}
            </div>
        </div>

        <div class="col-lg-6 col-6">
            <div class="form-group">
                {!! Form::label('id_quadra', 'Quadra:') !!}
                {!! Form::select(
                    'id_quadra',
                    \App\Models\Quadra::orderBy('nome')->pluck('nome', 'id')->toArray(),
                    null,
                    ['class' => 'form-control', 'required'],
                ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-6">

            <div class="form-group">
                {!! Form::label('horario_inicio', 'Horario inicial:') !!}
                {!! Form::text('horario_inicio', $horario_inicio, ['class' => 'form-control', 'require','id' => 'horario_inicio']) !!}
            </div>
        </div>

        <div class="col-lg-6 col-6">
            <div class="form-group">
                {!! Form::label('horario_final', 'Horario Final:') !!}
                {!! Form::text('horario_final', $horario_final, ['class' => 'form-control', 'require','id' => 'horario_final']) !!}
            </div>
        </div>
    </div>



    <div class="form-group">
        {!! Form::label('id_users', 'Agendamento feito por:') !!}
        {!! Form::select(
            'id_users',
            \App\Models\User::where('name', auth()->user()->name)->pluck('name', 'id')->toArray(),
            null,
            ['class' => 'form-control', 'required'],
        ) !!}
    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Agendamento', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('agendas') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop
