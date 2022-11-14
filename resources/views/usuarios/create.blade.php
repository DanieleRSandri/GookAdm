@extends('adminlte::page')

@section('content')
    <div style="text-align:center">
        <h4>Novo Usuário</h4>
    </div>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => 'usuarios/store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nome:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Senha:') !!}
        {!! Form::password('password', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipoUsuario', 'Tipo Usuário:') !!}
        {!! Form::select('tipoUsuario', ['Administrador' => 'Administrador', 'Usuario' => 'Usuario'], 'Usuario', ['class' => 'form-control','require',]) !!}
    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Usuario', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('usuarios') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
