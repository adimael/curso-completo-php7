<?php

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", ""); //Configuração de conexão com banco de dados;

$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES 
(:LOGIN, :PASSWORD)"); //inserindo dados na tabela por parametros;

$login = "jose"; //nome de login;
$password = "123456"; //Senha de login;

$stmt->bindParam(":LOGIN", $login); //Passando Parametro nome login;
$stmt->bindParam(":PASSWORD", $password); //Passando Parametro Senha;

$stmt->execute(); //Executando;

echo "Inserido dados no banco de dados com sucesso!"; //Exibindo Mensagem na tela;

?>