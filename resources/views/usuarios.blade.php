<!DOCTYPE html>
<html>

<head>
    <title>Usuarios</title>
</head>

<body>
    <h3>Listagem de Usuários</h3>
    <!-- <ul>
            @foreach($usuarios as $usuario)
            <li>{{ $usuario->nome}}</li>
            <li>{{ $usuario->email}}</li>
            <li>{{ $usuario->flagAdmin}}</li>
            <br>
            @endforeach
        </ul> -->

    <table border="1">
        <tr>
            <td><b>Nome</td>
            <td><b>Email</td>
            <td><b>Flag Admin</td>
        </tr>
        @foreach($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->nome}}</td>
            <td>{{ $usuario->email}}</td>
            <td>{{ $usuario->flagAdmin}}</td>
        </tr>
        @endforeach

    </table>
</body>

</html>