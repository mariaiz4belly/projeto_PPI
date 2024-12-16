<?php
include_once('config.php')
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crosby</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel='icon' type='image/png' href='logo_crosby.png'>
</head>

<body>
    <!-- Navbar -->
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

    <!-- Área de login/cadastro -->
    <section class="area-login-cadastro">
        <div class="login-cadastro">
            <div class="logo-container">
                <img src="logo_crosby.png" alt="Logo Crosby">
            </div>
            <form method="post" action="cadastro_produtos.php" class="form-container">
            <section class="form-section">
            <h2>Adicionar Produto</h2>
            <br>
            <form id="formEstoque">
                <div class="form-group">
                    <label for="produto">Nome do Produto:</label>
                    <input type="text" id="produto" name="produto" placeholder="Digite o nome do produto" required>
                </div>
                <div class="form-group">
                    <label for="quantidade">Quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" placeholder="Digite a quantidade" required>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <input type="number" id="preco" name="preco" placeholder="Digite o preço do produto" required>
                </div>
                          <!-- Seção de Carrossel de Imagens -->
                          <div class="form-group">
                    <label for="imagens">Imagens do Produto:</label>
                    <input type="file" id="imagens" name="imagens" accept="image/*" multiple>
                    <div id="carrossel-imagens" class="carrossel-container">
                        <!-- As imagens do produto aparecerão aqui -->
                    </div>
                
                <div class="botoes">
                <button type="submit"  class='botao'>Adicionar ao Estoque</button>
                </div>
            </form>
        </section>

        <!-- Tabela de Produtos -->
        <section class="tabela-section">
            <h2>Produtos no Estoque</h2>
            <table id="tabelaEstoque">
              
                <tbody>
                    <!-- Os itens adicionados aparecerão aqui -->
                </tbody>
            </table>
              
            
            </table>
        </section>
    </div>


            </form>
           
        </div>
    </section>

    <!-- Rodapé -->
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
            <link rel='icon' type='image/png' href='logo_crosby.png'>
        </div>
    </footer>
    <script src="estoque.cjs"></script>
</body>

</html>