@extends('adminlte::page')

@section('content')
<div style="text-align:center">
    <h4>Editando Local: {{ $local->nome }}</h4>
</div>
    @if($errors->any())
        <ul class='alert alert-danger'>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['route'=> ["locais.update",'id'=>$local->id],'method'=>'put']) !!}

        <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome',$local->nome,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco',$local->endereco,['class'=>'form-control', 'require']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('telefone', 'Telefone:') !!}
            {!! Form::text('telefone',$local->telefone,['class'=>'form-control', 'require']) !!}
            </div>
    
            <div class="form-group">
            {!! Form::label('cnpj', 'CNPJ:') !!}
            {!! Form::text('cnpj',$local->cnpj,['class'=>'form-control', 'require']) !!}
            </div>
        
        <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Local', ['class'=>'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar',['class'=>'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('locais') }}">Voltar</a>
        </div>

    {!! Form::close() !!}

@stop