@extends('adminlte::page')
@section('content')
    <h1 style="padding-top: 15px; text-align: center">Agendamentos</h1>
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales/pt-br.js'></script>
    <script>
        function getColor($status) {
            $eventColor = '';
            if ($status == 'Disponivel') {
                $eventColor = '#006400';
            } else if ($status == 'Agendado') {
                $eventColor = '#FFD700';
            } else if ($status == 'NaoCompareceu') {
                $eventColor = '#778899';
            } else {
                $eventColor = '#FF0000';
            }
            return $eventColor;
        }

        document.addEventListener('DOMContentLoaded', function() {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'

                },
                dateClick: function(info) {
                    var $dataDia = info.dateStr;
                    window.location.href = ("agendas/create/" + $dataDia);
                },
                events: [
                    @foreach ($agendas as $agendas)
                        {
                            id: '{{ $agendas->id }}',
                            title: '{{ $agendas->status }}',
                            start: '{{ $agendas->data }}T{{ $agendas->horario_inicio }}',
                            end: '{{ $agendas->data }}T{{ $agendas->horario_final }}',
                            extendedProps: {
                                cliente: '{{ isset($agendas->id_cliente) ? $agendas->cliente->nome : '-' }}',
                                quadra: '{{ isset($agendas->id_quadra) ? $agendas->quadra->nome : '-' }}'
                            },
                            color: getColor('{{ $agendas->status }}')
                        },
                    @endforeach
                ],
                eventClick: function(info) {

                    info.jsEvent.preventDefault(); // don't let the browser navigate          
                    $('#vizualizar #id').text(info.event.id)
                    $('#vizualizar #title').text(info.event.title)
                    $('#vizualizar #start').text(info.event.start.toLocaleString())
                    $('#vizualizar #end').text(info.event.end.toLocaleString())
                    $('#vizualizar #Quadra').text(info.event.extendedProps.quadra)
                    $('#vizualizar #Cliente').text(info.event.extendedProps.cliente)
                    $('#vizualizar').modal('show');
                    $("#edit").attr("href", 'agendas/' + info.event.id + '/edit')
                },
            });
            calendar.render();
        });
    </script>

    <!-- Calendar -->
    <div id='calendar'></div>

    <!-- Modal -->
    <div class="modal fade" id="vizualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="vizualizar">
                        <dl class="row">
                            <dt class="col-sm-3">ID do Evento:</dt>
                            <dd class="col-sm-9" id="id"></dd>
                            <dt class="col-sm-3">Status do Evento:</dt>
                            <dd class="col-sm-9" id="title"></dd>
                            <dt class="col-sm-3">Inicio Evento:</dt>
                            <dd class="col-sm-9" id="start"></dd>
                            <dt class="col-sm-3">Fim do Evento:</dt>
                            <dd class="col-sm-9" id="end"></dd>
                            <dt class="col-sm-3"> Quadra:</dt>
                            <dd class="col-sm-9" id="Quadra"></dd>
                            <dt class="col-sm-3"> Cliente:</dt>
                            <dd class="col-sm-9" id="Cliente"></dd>
                        </dl>
                        <div class="form-group" style="text-align:center">
                            <a id="edit" href="" class="btn btn-outline-success">Editar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
