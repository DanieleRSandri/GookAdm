@extends('adminlte::page')

@section('content')
    <h4> Novo Local</h4>
    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>'locais/store']) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome',null,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco',null,['class'=>'form-control', 'require']) !!}
        </div>
        
        <div class="form-group">
        {!! Form::submit('Criar Local', ['class'=>'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar',['class'=>'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('locais.listar') }}">Voltar</a>
        </div>

    {!! Form::close() !!}

@stop