<!DOCTYPE html>
<html>

<head>
    <title>Consumo Produtos</title>
</head>

<body>
    <h3>Listagem de consumo de produtos</h3>
    <table border="1">
        <tr>
            <td><b>Produto</td>
            <td><b>Quantidade</td>
            <td><b>Consumo</td>
        </tr>
        @foreach($consumoProduto as $consumo)
        <tr>
            <td>{{ $consumo->id_produto}}</td>
            <td>{{ $consumo->quantidade}}</td>
            <td>{{ $consumo->id_consumo}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>

