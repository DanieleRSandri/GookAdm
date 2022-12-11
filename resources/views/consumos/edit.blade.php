@extends('adminlte::page')

@section('content')
<br>
<h4 style="text-align:center">Editando Consumo: {{ $consumo->id }}</h4>
    <div class="card">
  
        <div class="card-body">
            {!! Form::open(['route' => ['consumos.update', 'id' => $consumo->id], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('id_cliente', 'Cliente:') !!}
                {!! Form::select(
                    'id_cliente',
                    \App\Models\Cliente::orderBy('nome')->pluck('nome', 'id')->toArray(),
                    $consumo->id_cliente,
                    ['class' => 'form-control', 'required'],
                ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('valorTotal', 'Valor Total:') !!}
                {!! Form::text('valorTotal', $consumo->valorTotal, ['class' => 'form-control', 'require']) !!}
            </div>

            <fieldset>
                <legend class="legend">Produtos</legend>
                <table class="table table-stipe table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th colspan="2" style="display: flex; flex-wrap: wrap; flex-direction: column;">
                            <button class="add_field_button btn-add" title="Adicionar" id="btnAdicionarProduto">Adicionar</button>
                            </th>
                        </tr>                        
                    </thead>
                    <tbody id='body'>
                        @foreach ( $consumo->consumoProdutos as $a )
                        <tr id='tr-produto'>
<td> {{$a->produtos}}</td>
                        </tr>  
                        @endforeach
                      

                    </tbody>

                </table>
            </fieldset>

            <div class="form-group" style="text-align:center">
                {!! Form::submit('Editar Consumo', ['class' => 'btn btn-outline-success']) !!}
                <a class="btn btn-outline-danger" href="{{ route('consumos') }}">Voltar</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

    @can('Usuario')
    <script>
        alert('Você não tem permissão para acessar essa página!')
        window.location = "/home";
    </script>
@endcan

@stop

