<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Listagem de Agendamentos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Importando a folha de estilos do framework por meio da CDN: -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>
<body>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Horario Inicio</th>
                <th scope="col">Horario Final</th>
                <th scope="col">Cliente</th>
                <th scope="col">Quadra</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($agendas as $agenda)
                <tr align="center">
                    <td>{{ $agenda->status }}</td>
                    <td>{{ Carbon\Carbon::parse($agenda->data)->format('d-m-Y') }}</td>
                    <td>{{ Carbon\Carbon::parse($agenda->horario_inicio)->format('h:i') }}</td>
                    <td>{{ Carbon\Carbon::parse($agenda->horario_final)->format('h:i') }}</td>
                    <td>{{ $agenda->id_cliente }}</td>
                    <td>{{ $agenda->id_quadra }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
