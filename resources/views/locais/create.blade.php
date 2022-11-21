@extends('adminlte::page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready(function($){
        $('#cnpj').mask('00.000.000/0000-00');
        $('#phone').mask('(00) 00000-0000');
    });
</script>

@section('content')
    <div style="text-align:center">
        <h4>Novo Local</h4>
    </div>

    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['route' => 'locais.store']) !!}


    <div class="form-group">
        {!! Form::label('nome', 'Nome') !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone') !!}
        {!! Form::text('telefone', null, ['class' => 'form-control', 'require', 'id'=>'phone']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cnpj', 'CNPJ:') !!}
        {!! Form::text('cnpj', null, ['class' => 'form-control', 'require', 'id'=>'cnpj']) !!}
    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Local', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('locais') }}">Voltar</a>
    </div>

    {!! Form::close() !!}

@stop
