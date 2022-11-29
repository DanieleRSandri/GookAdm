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
                $.get('/' + "locais" + '/' + id + '/destroy', function(data) {
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
    <div style="text-align:center">
        <h4>Listagem de Locais</h4>
    </div>

    <table class="table table-striped">
        <thead>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>CNPJ</th>
            <th>Ações</th>
        </thead>

        <tbody>
            @foreach ($locais as $local)
                <tr>
                    <td>{{ $local->nome }}</td>
                    <td>{{ $local->endereco }}</td>
                    <td>{{ $local->telefone }}</td>
                    <td>{{ $local->cnpj }}</td>
                    <td>
                        <a href="{{ route('locais.edit', ['id' => Crypt::encrypt($local->id)]) }}"
                            class="btn btn-outline-success">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @can('Usuario')
        <script>
            alert('Você não tem permissão para acessar essa página!')
            window.location = "/home";
        </script>
    @endcan

@stop
