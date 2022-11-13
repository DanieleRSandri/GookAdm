@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Novo Produto</h4>
</div>
    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>'produtos/store']) !!}

        <div class="form-group">
        {!! Form::label('descricao', 'Descrição') !!}
        {!! Form::text('descricao',null,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('precoUnitario', 'Preço Unitário:') !!}
        {!! Form::text('precoUnitario',null,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group" style="text-align:center">
            {!! Form::submit('Criar Produto', ['class'=>'btn btn-outline-success']) !!}
            {!! Form::reset('Limpar',['class'=>'btn btn-outline-secondary']) !!}
            <a class="btn btn-outline-danger" href="{{ route('produtos') }}">Voltar</a>
            </div>

    {!! Form::close() !!}

@stop
