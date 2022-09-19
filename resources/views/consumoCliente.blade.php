<!DOCTYPE html>
<html>

<head>
    <title>Consumo Clientes</title>
</head>

<body>
    <h3>Listagem de consumo de Clientes</h3>
    <table border="1">
        <tr>
            <td><b>Valor Total</td>
            <td><b>Cliente</td>
        </tr>
        @foreach($consumoCliente as $consumo)
        <tr>
            <td>{{ $consumo->valorTotal}}</td>
            <td>{{ $consumo->id_cliente}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>

