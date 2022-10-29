<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
    <table class="table table-hover">
        <thead>
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
            <tr>
                <td>{{ $agenda->status }}</td>
                <td>{{ $agenda->data }}</td>
                <td>{{ $agenda->horario_inicio }}</td>
                <td>{{ $agenda->horario_final }}</td>                    
                <td>{{ $agenda->id_cliente }}</td>
                <td>{{ $agenda->id_quadra }}</td>
            </tr>
        @endforeach
         
        </tbody>
      </table>
</body>
</html>
