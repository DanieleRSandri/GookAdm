@extends('adminlte::page')

@section('content')

    <div style="text-align:center">
        <h4>Listagem de Usuários</h4>
    </div>

    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Flag Admin</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->name}}</td>
            <td>{{ $usuario->email}}</td>
            <td>{{ $usuario->tipoUsuario}}</td>
            <td>
                <a href="{{ route('usuarios.edit', ['id' => $usuario->id]) }}"
                    class="btn btn-outline-success">Editar</a>
                    <a href="{{ route('usuarios.destroy', ['id' => $usuario->id]) }}"
                    class="btn btn-outline-danger">Remover</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="form-group" style="text-align:center">
        <a class="btn btn-outline-primary" href="{{ route('usuarios.create') }}">Novo Usuario</a>
    </div>

@stop
