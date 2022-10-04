@extends('adminlte::page')

@section('content')
    <h4> Novo Cliente</h4>
    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>'clientes/store']) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome',null,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('cpf', 'Cpf:') !!}
        {!! Form::text('cpf',null,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('endereco', 'Endereço:') !!}
            {!! Form::text('endereco',null,['class'=>'form-control', 'require']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('telefone', 'Telefone:') !!}
                {!! Form::text('telefone',null,['class'=>'form-control', 'require']) !!}
                </div>
        <div class="form-group">
        {!! Form::submit('Criar Cliente', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar',['class'=>'btn btn-default']) !!}
        <a class="btn btn-outline-danger" href="{{ route('clientes.listar') }}">Voltar</a>
        </div>

    {!! Form::close() !!}

@stop
