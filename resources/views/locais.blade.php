<!DOCTYPE html>
<html>

<head>
    <title>Locais</title>
</head>

<body>
    <h3>Listagem de Locais</h3>
    <table border="1">
        <tr>
            <td><b>Nome</td>
            <td><b>Endereco</td>
        </tr>
        @foreach($locais as $local)
        <tr>
            <td>{{ $local->nome}}</td>
            <td>{{ $local->endereco}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>