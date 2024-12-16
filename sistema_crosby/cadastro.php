<?php

include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
   
    
    // Inserindo os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";

    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
        header("Location: login.php");  // Redireciona para a página de sucesso
        exit;
    } else {
        echo "Erro: " . $conexao->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crosby - Cadastro</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>

<nav class="navbar">
        <div class="navbar-logo">
            <img src="logocrosby_original.png" alt="Logo Crosby">
        </div>
        <span class="navbar-title"></span>
        <ul class="navbar-links">
            <li><a href="login.php">LOGIN</a></li>
            <li><a href="cadastro.php">CADASTRO</a></li>
            <li><a href="estoque.php">ESTOQUE</a></li>
        </ul>
    </nav>

    <section class="area-login-cadastro">
        <div class="login-cadastro">
            <div class="logo-container">
                <img src="logo_crosby.png" alt="Logo Crosby">
            </div>
            <form method="post" action="cadastro.php" class="form-container">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Nome" autofocus required>
                </div>

                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <div class="botoes">
                    <button type="submit" class="botao">Salvar</button>
                </div>
            
            </form>
            <p>Já possui uma conta Crosby? <a href="login.php"><b>Faça o login aqui.</b></a></p>
        </div>
    </section>

    <footer>
        <div class="line-footer borda">
            <p><i class="bi bi-envelope-fill"></i>
                <a href="mailto:inventario@crosbyoficial.com.br">inventario@crosbyoficial.com.br</a><br />
            </p>

            <div class="rodape">
                Copyright © 2024 CROSBY DISTRIBUIÇÃO E CONFECÇÃO LTDA - CNPJ: 17.177.680/0001-16
                <br><b>Política de Privacidade | Política de Vendas | Avisos Legais | Mapa do Site</b><br />
                <b>Desenvolvedores:</b> Daniel Oliveira, Emilia Marinho, Júlio Vieira e Maria Izabelly.
            </div>
        </div>
    </footer>
</body>

</html>
