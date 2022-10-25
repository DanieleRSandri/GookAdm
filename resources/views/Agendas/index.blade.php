@extends('adminlte::page')
@section('plugins.fullcalendar', true)
@section('content')
    <h1 style="padding-top: 15px; text-align: center">Agendamentos</h1>
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script src='fullcalendar/locales/pt-br.js'></script>
    <script>
        function getColor($status) {
            $eventColor = '';
            if ($status == 'Disponivel') {
                $eventColor = '#006400';
            } else if ($status == 'Agendado') {
                $eventColor = '#ff0';
            } else {
                $eventColor = '#FF0000';
            }
            return $eventColor;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'novo dayGridMonth,timeGridWeek,timeGridDay'
                },
                customButtons: {
                    novo: {
                        text: 'Novo Agendamento',
                        click: function() {
                            window.location.href = ("http://127.0.0.1:8000/agendas/create");
                        }
                    }
                },
                events: [
                    @foreach ($agendas as $agendas)
                        {
                            title: '{{ $agendas->status }}',
                            start: '{{ $agendas->inicio }}',
                            end: '{{ $agendas->final }}',
                            color: getColor('{{ $agendas->status }}')

                        },
                    @endforeach

                ],
                  eventClick: function(event) {

    window.location.href = ("http://127.0.0.1:8000/agendas/1/edit");
 
  }

            });
            calendar.render();
        });
    </script>
    <div id='calendar'></div>


@stop
