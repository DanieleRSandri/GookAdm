@extends('adminlte::page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready(function($) {
        $('#cpf').mask('000.000.000-00');
        $('#phone').focusout(function() {
            var phone, element;
            element = $(this);
            element.unmask();
            phone = element.val().replace(/\D/g, '');
            if (phone.length > 10) {
                element.mask("(99) 99999-9999");
            } else {
                element.mask("(99) 9999-99999");
            }
        }).trigger('focusout');


    });
</script>

@section('content')
    <br>
    <h4 style="text-align:center">Novo Cliente</h4>

    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => 'clientes/store']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cpf', 'Cpf:') !!}
        {!! Form::text('cpf', null, ['class' => 'form-control', 'require', 'id' => 'cpf']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', null, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', null, ['class' => 'form-control', 'require', 'id' => 'phone']) !!}
    </div>
    <div class="form-group" style="text-align:center">
        {!! Form::submit('Criar Cliente', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('clientes') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

@stop
