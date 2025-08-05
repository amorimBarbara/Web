<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção no Banco</title>
</head>
<body>
    <?php
    // Conexão com o banco
    $conexao = mysqli_connect("localhost", "root", "", "progwebbd")
        or die("Erro ao conectar. " . mysqli_connect_error());

    // Variáveis com os dados
    $nome = "Bárbara";
    $cpf = "000000000-00";
    $endereco = "rua 1";
    $estados_sigla = "MG";
    $dtNasc = "2025-07-30"; // Formato ideal para banco: AAAA-MM-DD
    $sexo = "F";
    $login = "barbara";
    $senha = "PerolaeTaylor";
    $cinema = 1;
    $musica = 1;
    $info = 1;

    // Comando SQL
    $sql = "INSERT INTO Cliente(nome, cpf, endereco, estados_sigla, dtNasc, sexo, login, senha, cinema, musica, info)
            VALUES ('$nome', '$cpf', '$endereco', '$estados_sigla', '$dtNasc', '$sexo', '$login', '$senha', $cinema, $musica, $info)";

    // Executar a query
    if (mysqli_query($conexao, $sql)) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conexao);
    }

    // Fechar conexão
    mysqli_close($conexao);
    ?>
</body>
</html>


