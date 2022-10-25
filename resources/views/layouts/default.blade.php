@extends('adminlte::page')

@section('plugins.Sweetalert2', true)
@section('plugins.fullcalendar', true)

@section('js')
    <script>
        function ConfirmaExclusao(id) {
            swal.fire({
                title: 'Confirma a Exclusão?',
                text: "Esta Ação Não Pode Ser Desfeita!",
                type: 'warning', showCancelButton: true,
                confirmButtonColor: '#3085d6', confirmButtonText: 'Sim, Excluir!',
                cancelButtonColor: '#d33', cancelButtonText: 'Cancelar',
                closeOnConfirm: false,
            }).then(function(isConfirm) {
                if (isConfirm.value) {
                    $.get('/' + @yield('table-delete') + '/' + id + '/destroy',function(data) {
                        swal.fire('Excluído!', 'Registro Excluído Com Sucesso.', 'success')
                            .then(function() {
                                window.location.reload();
                            });
                    });
                }
            })
        }
    </script>
@stop
