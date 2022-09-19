<!DOCTYPE html>
<html>

<head>
    <title>Clientes</title>
</head>

<body>
    <h3>Listagem de Clientes</h3>
    <table border="1">
        <tr>
            <td><b>Nome</td>
            <td><b>CPF</td>
            <td><b>Telefone</td>
            <td><b>Endereço</td>
        </tr>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nome}}</td>
            <td>{{ $cliente->cpf}}</td>
            <td>{{ $cliente->telefone}}</td>
            <td>{{ $cliente->endereco}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>