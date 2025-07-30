<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $conexao=mysqli_connect("localhost", "root", "", "progwebbd")
         or die("Erro ao conectar. " . mysqli_error());
     mysqli_query($conexão,"comando");
    $nome="Bárbara";
    $cpf="000000000-00";
    $endereco="rua 1";
    $estados_sigla="MG";
    $dtNasc="30/07/2025";
    $sexo="F";
    $login="barbara"
    $senha="PerolaeTaylor"
    $cinema=1;
    $musica=1;
    $info=1

    $sql = "INSERT INTO Cliente(nome, cpf, endereco, estados_sigla, dtNasc, sexo,
            login, senha, cinema, musica, info)
            VALUES ('$nome', '$cpf', '$endereco, '$estados_sigla', '$dtNasc, '$sexo, '$login', '$senha, '$cinema', '$musica, '$info)";
    mysqli_query($conexao,$sql);
    ?>
</body>
</html>
