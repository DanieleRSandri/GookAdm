﻿@extends('adminlte::page')

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
                $.get('/' + "consumos" + '/' + id + '/destroy', function(data) {
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
    <div class="container-fluid">
        <h3>Consumo</h3>

        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Valor Total</th>
                    <th>Produtos</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consumos as $consumo)
                    <tr>
                        <td>{{ $consumo->cliente->nome }}</td>
                        <td>{{ $consumo->valorTotal }}</td>
                        <td>
                            @foreach ($consumo->consumoProdutos as $a)
                                <li>{{ $a->produto->descricao }}</li>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-group" style="text-align:center">
            <a class="btn btn-outline-primary" href="{{ route('consumos.create') }}">Novo Consumo</a>
        </div>

    </div>
@stop
