@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Editando Consumo:</h4>
</div>
    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url'=>"consumoClientes/$consumoClientes->id/update", 'method'=>'put']) !!}

        <div class="form-group">
        {!! Form::label('valorTotal', 'Valor Total:') !!}
        {!! Form::text('valorTotal',$consumoClientes->valorTotal ,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('id_cliente', 'cliente:') !!}
        {!! Form::select('id_cliente',\App\Models\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(), $consumoClientes->id_cliente  ,['class' => 'form-control', 'required']) !!}
        </div>

        <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Consumo', ['class'=>'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar',['class'=>'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('consumoClientes') }}">Voltar</a>
        </div>

    {!! Form::close() !!}

@stop