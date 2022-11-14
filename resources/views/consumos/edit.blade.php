@extends('adminlte::page')

@section('content')
    <div class="card">
        <div class="card-header" style="background: lightgrey">
            <h3>Novo Consumo</h3>
        </div>

        <div class="card-body">
            {!! Form::open(['route' => 'consumos.store']) !!}

            <div class="form-group">
                {!! Form::label('id_cliente', 'Cliente:') !!}
                {!! Form::select(
                    'id_cliente',
                    \App\Models\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(),
                    null,
                    ['class' => 'form-control', 'required'],
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valorTotal', 'Valor Total:') !!}
                {!! Form::text('valorTotal', null, ['class' => 'form-control', 'require']) !!}
            </div>
            <hr />

            <h4>Produtos</h4>
            <div class="input_fields_wrap"></div>
            <br>

            <button style="float:right" class="add_field_button btn btn-outline-secondary">Adicionar Produto</button>

            <br>
            <hr />

            <div class="form-group" style="text-align:center">
                {!! Form::submit('Criar Consumo', ['class' => 'btn btn-outline-success']) !!}
                <a class="btn btn-outline-danger" href="{{ route('consumos') }}">Voltar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function() {
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 0;
            $(add_button).click(function(e) {
                x++;
                var newField =
                    '<div><div style="width:94%; float:left" id="ator">{!! Form::select(
                        'produtos[]',
                        \App\Models\Produto::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                        null,
                        ['class' => 'form-control', 'required', 'placeholder' => 'Selecione um Produto'],
                    ) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></button></div>';
                $(wrapper).append(newField);
            });
            $(wrapper).on("click", ".remove_field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            });
        })
    </script>

@stop
