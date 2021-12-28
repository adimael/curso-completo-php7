<?php

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", ""); //Configuração de conexão com banco de dados;

$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, 
dessenha = :PASSWORD WHERE idusuario = :ID"); //inserindo dados na tabela por parametros;

$login = "joão"; //nome de login;
$password = "qwerty"; //Senha de login;
$id = 2;

$stmt->bindParam(":LOGIN", $login); //Passando Parametro nome login;
$stmt->bindParam(":PASSWORD", $password); //Passando Parametro Senha;
$stmt->bindParam(":ID", $id);

$stmt->execute(); //Executando;

echo "Dados atualizados com sucesso!"; //Exibindo Mensagem na tela;

?>