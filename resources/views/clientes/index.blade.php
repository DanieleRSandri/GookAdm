@extends('adminlte::page')

@section('plugins.Sweetalert2', true)
<script>
    function ConfirmaExclusao(id) {
        swal.fire({
            title: 'Confirma a exclusão?',
            text: "Esta ação não poderá ser revertida!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: 'Cancelar!',
            closeOnConfirm: false,
        }).then(function(isConfirm) {
            if (isConfirm.value) {
                $.get('/' + "clientes" + '/' + id + '/destroy', function(data) {
                    //success data
                    console.log(data.status);
                    if (data.status == 200) {
                        swal.fire(
                            'Deletado!',
                            'Exclusão confirmada.',
                            'success'
                        ).then(function(isConfirm) {
                            window.location.reload();
                        });
                    } else
                        swal.fire(
                            'Erro!',
                            'Ocorreram erros na exclusão. Entre em contato com o suporte.',
                            'error'
                        );
                });
            }
        })
    }
</script>

@section('content')
    <br>
    <h4 style="text-align:center">Listagem de Clientes</h4>

    {!! Form::open(['name' => 'form_name', 'route' => 'clientes']) !!}
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
            <th>CPF</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($cliente->cpf, $limit = 3, $end = '.***.***-**') }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', ['id' => Crypt::encrypt($cliente->id)]) }}"
                            class="btn btn-outline-success">Editar</a>
                        <a href="#" onclick="return ConfirmaExclusao({{ $cliente->id }})"
                            class="btn btn-outline-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links('pagination::bootstrap-4') }}
    <div class="form-group" style="text-align:center">
        <a class="btn btn-outline-primary" href="{{ route('clientes.create') }}">Novo Cliente</a>
    </div>

@stop
