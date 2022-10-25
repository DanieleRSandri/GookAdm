@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Novo Consumo</h4>
</div>
    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>'consumoProdutos/store']) !!}

    <div class="form-group">
        {!! Form::label('id_consumo', 'Consumo:') !!}
        {!! Form::select('id_consumo',\App\Models\ConsumoCliente::pluck('id', 'id')->toArray(), null ,['class' => 'form-control', 'required']) !!}
        </div>

    <div class="form-group">
        {!! Form::label('id_produto', 'Produto:') !!}
        {!! Form::select('id_produto',\App\Models\Produto::orderBy('descricao')->pluck('descricao', 'id')->toArray(), null ,['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('quantidade', 'Quantidade:') !!}
        {!! Form::text('quantidade',null,['class'=>'form-control', 'require']) !!}
        </div>

    

        <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Consumo', ['class'=>'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar',['class'=>'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('consumoProdutos') }}">Voltar</a>
        </div>

    {!! Form::close() !!}

@stop