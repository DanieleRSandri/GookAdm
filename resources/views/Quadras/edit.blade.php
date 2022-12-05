@extends('adminlte::page')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

<script>
    $(document).ready(function($) {
        // $('#money').mask('000.00');

        // $('#money').mask("#.##0,00");
        $('#money').mask("#.##0.00", {
            reverse: true
        });
    });
</script>

@section('content')
    <br>
    <h4 style="text-align:center">Editando Quadra: {{ $quadra->descricao }}</h4>

    @if ($errors->any())
        <ul class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>
    @endif

    {!! Form::open(['url' => "quadras/$quadra->id/update", 'method' => 'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $quadra->nome, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo', 'Tipo Quadra:') !!}
        {!! Form::text('tipo', $quadra->tipo, ['class' => 'form-control', 'require']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('valorTempo', 'Valor Tempo:') !!}
        {!! Form::text('valorTempo', $quadra->valorTempo, ['class' => 'form-control', 'require', 'id' => 'money']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_local', 'Local:') !!}
        {!! Form::select(
            'id_local',
            \App\Models\Locais::orderBy('nome')->pluck('nome', 'id')->toArray(),
            $quadra->id_local,
            ['class' => 'form-control', 'required'],
        ) !!}

    </div>

    <div class="form-group" style="text-align:center">
        {!! Form::submit('Editar Quadra', ['class' => 'btn btn-outline-success']) !!}
        {!! Form::reset('Limpar', ['class' => 'btn btn-outline-secondary']) !!}
        <a class="btn btn-outline-danger" href="{{ route('quadras') }}">Voltar</a>
    </div>
    {!! Form::close() !!}

    @can('Usuario')
        <script>
            alert('Você não tem permissão para acessar essa página!')
            window.location = "/home";
        </script>
    @endcan

@stop
