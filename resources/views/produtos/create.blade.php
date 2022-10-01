@extends('adminlte::page')

@section('content')
    <h4> Novo Produto</h4>
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

        <div class="form-group">
            {!! Form::label('quantidade', 'Quantidade:') !!}
            {!! Form::text('quantidade',null,['class'=>'form-control', 'require']) !!}
            </div>
        
        <div class="form-group">
        {!! Form::submit('Criar Produto', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar',['class'=>'btn btn-default']) !!}
        </div>

    {!! Form::close() !!}

@stop
