<!DOCTYPE html>
<html>

<head>
    <title>Quadras</title>
</head>

<body>
    <h3>Listagem de Quadras</h3>
    <table border="1">
        <tr>
            <td><b>Nome</td>
            <td><b>Tipo</td>
            <td><b>Tempo de Partida</td>
            <td><b>Valor do Tempo</td>
            <td><b>Local</td>
        </tr>
        @foreach($quadras as $quadra)
        <tr>
            <td>{{ $quadra->nome}}</td>
            <td>{{ $quadra->tipo}}</td>
            <td>{{ $quadra->tempoPartida}}</td>
            <td>{{ $quadra->valorTempo}}</td>
            <td>{{ $quadra->id_local}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>