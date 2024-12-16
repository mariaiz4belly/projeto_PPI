<?php
include_once('config.php');  // Inclui o arquivo de configuração do banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Dados do produto
    $nome = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $imagens = json_decode($_POST['imagens']); // Recebe os caminhos das imagens

    // Prepara a query para inserir os dados no banco
    //$sql = "INSERT INTO produtos (nome, quantidade, preco, imagens) VALUES ('$nome', $quantidade,$preco,$imagens)";
    $sql = "INSERT INTO produto (nome, preco) VALUES ('$nome',$preco)";
    $result = $conexao->query($sql);

    // Prepara a consulta
    //$stmt = $conexao->prepare($sql);
    //$stmt->bind_param("sids", $nome, $quantidade, $preco, json_encode($imagens));  // Usa JSON para armazenar as imagens
    //$stmt->bind_param("ss", $nome,$preco);  // Usa JSON para armazenar as imagens

    // Executa a consulta
    if ($result) {
        echo "Produto adicionado com sucesso!";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a conexão
    //$stmt->close();
    $conexao->close();
}
?>
