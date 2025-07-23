<?php
// Inicializa a variável de mensagem
$message = '';
$page = isset($_GET['pagina']) ? $_GET['pagina'] : 'home';

if ($page === 'home') {
    $content = "<div class='normal-content'><h1>Home</h1><p>Bem-vindo à página inicial!</p></div>";
} elseif ($page === 'contato') {
    $content = "<div class='normal-content'><h1>Contato</h1><p>Esta é a página de contato.</p></div>";
} elseif ($page === 'login') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if ($usuario === 'admin' && $senha === '1234') {
            $message = "Bem-vindo!";
        } else {
            $message = "Usuário ou senha incorretos.";
        }
    }
    $content = '
    <div class="form-center">
        <form method="POST">
            <label for="usuario">Usuário:</label>
            <input type="text" name="usuario" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>
            <button type="submit">Entrar</button>
            <p>' . $message . '</p>
        </form>
    </div>';
} elseif ($page === 'cadastro') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        header("Location: index.php?pagina=confirmacao");
        exit();
    }
    $content = '
    <div class="form-center">
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>';
} elseif ($page === 'confirmacao') {
    $content = '<div class="normal-content"><h1>Cadastro feito com sucesso!</h1></div>';
} elseif ($page === 'formulario') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $message = "Olá, $nome!";
    }
    $content = '
    <div class="form-center">
        <form method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>
            <button type="submit">Enviar</button>
            <p>' . $message . '</p>
        </form>
    </div>';
} else {
    $content = '<div class="normal-content"><h1>Página não encontrada</h1><p>Desculpe, a página que você está procurando não existe.</p></div>';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Site com Múltiplas Atividades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1c1c1c;
            color: #ccc;
            margin: 0;
            padding: 0;
        }

        nav {
            background-color: #4B0082;
            padding: 1em;
            text-align: center;
        }

        nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            color: #ccc;
        }

        .normal-content {
            padding: 2em;
        }

        .form-center {
            min-height: calc(100vh - 100px); /* ocupa a tela toda exceto a barra */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2em;
        }

        form {
            background-color: #2f2f2f;
            padding: 2em;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 0 15px rgba(0,0,0,0.4);
        }

        label {
            display: block;
            margin-top: 1em;
        }

        input {
            width: 100%;
            padding: 0.5em;
            margin-top: 0.3em;
            background-color: #444;
            color: #fff;
            border: 1px solid #666;
            border-radius: 5px;
        }

        button {
            margin-top: 1.5em;
            padding: 0.7em 1.5em;
            background-color: #6A0DAD;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #7B1FA2;
        }

        h1 {
            color: #9370DB;
        }

        p {
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <nav>
        <a href="?pagina=home">Home</a>
        <a href="?pagina=contato">Contato</a>
        <a href="?pagina=login">Login</a>
        <a href="?pagina=cadastro">Cadastro</a>
        <a href="?pagina=formulario">Formulário</a>
    </nav>

    <?php echo $content; ?>
</body>
</html>
