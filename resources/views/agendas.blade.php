<!DOCTYPE html>
<html>

<head>
    <title>Agendas</title>
</head>

<body>
    <h3>Listagem de Agendamentos</h3>
    <table border="1">
        <tr>
            <td><b>Data</td>
            <td><b>Horário</td>
            <td><b>Status</td>
            <td><b>Quadra</td>
            <td><b>Cliente</td>
        </tr>
        @foreach($agendas as $agendamento)
        <tr>
            <td>{{ $agendamento->data}}</td>
            <td>{{ $agendamento->horario}}</td>
            <td>{{ $agendamento->status}}</td>
            <td>{{ $agendamento->id_quadra}}</td>
            <td>{{ $agendamento->id_cliente}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>

