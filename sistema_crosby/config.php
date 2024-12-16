<?php

$dbhost = 'localhost';
$dbuser = 'root';  // Usuário do MySQL (no XAMPP geralmente é 'root')
$dbpassword = '123';  // Senha do MySQL (deixe em branco se não houver senha)
$dbnome = 'sistema_estoque';  // Nome do banco de dados

$conexao = new mysqli($dbhost, $dbuser,$dbpassword,$dbnome);

if($conexao->connect_errno)
{
    echo "erro";
}
else
{
    echo "";
    
}

?>
