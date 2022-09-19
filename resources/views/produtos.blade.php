<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
</head>

<body>
    <h3>Listagem de Produtos</h3>
    <table border="1">
        <tr>
            <td><b>Descrição</td>
            <td><b>Preço Unitário</td>
            <td><b>Quantidade em Estoque</td>
        </tr>
        @foreach($produtos as $produto)
        <tr>
            <td>{{ $produto->descricao}}</td>
            <td>{{ $produto->precoUnitario}}</td>
            <td>{{ $produto->quantidade}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>