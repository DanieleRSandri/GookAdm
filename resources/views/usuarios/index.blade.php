@extends('layouts.default')
@section('content')
<h4 style="padding: 15px; text-align: center">Listagem de Usuários.</h4>
    {!! Form::open(['name' => 'form_name', 'route' => 'usuarios']) !!}
    <div calss="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;"
                placeholder="Pesquisa...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default"><i
                        class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
    {!! Form::close() !!}
    <br>
    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Flag Admin</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->tipoUsuario }}</td>
                    <td>
                        <a href="{{ route('usuarios.edit', ['id' => \Crypt::encrypt($usuario->id)]) }}"
                            class="btn btn-outline-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $usuario->id }})"
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

@section('table-delete')
    "usuarios"
@stop
