{{-- @extends('adminlte::page') --}}
@extends('adminlte::page')

@section('content')
    <div style="text-align:center">
        <h4>Listagem de Quadras</h4>
    </div>

    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Valor do Tempo</th>
            <th>Local</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($quadras as $quadra)
                <tr>
                    <td>{{ $quadra->nome }}</td>
                    <td>{{ $quadra->tipo }}</td>
                    <td>{{ $quadra->valorTempo }}</td>
                    <td>{{ $quadra->local->nome }}</td>
                    <td>
                        <a href="{{ route('quadras.edit', ['id' => $quadra->id]) }}"
                            class="btn btn-outline-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $quadra->id }})"
                            class="btn btn-outline-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="form-group" style="text-align:center">
        <a class="btn btn-outline-primary" href="{{ route('quadras.create') }}">Nova Quadra</a>
    </div>
@stop

{{-- @section('table-delete')
"quadras"
@stop --}}
