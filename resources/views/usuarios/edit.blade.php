@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Editando Usuario:{{$user->name}} </h4>
</div>
    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>"usuarios/$user->id/update", 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Nome:') !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', $user->email , ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Senha:') !!}
        {!! Form::text('password', $user->password , ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipoUsuario', 'Tipo Usuario:') !!}
        {!! Form::select('tipoUsuario',
                            array('Administrador'=>'Administrador',
                                'Usuario'=> 'Usuario'),
                                $user->tipoUsuario ,['class'=>'form-control', 'require']) !!}
        </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Cliente', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('usuarios') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
