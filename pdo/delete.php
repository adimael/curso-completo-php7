<?php

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", ""); //Configuração de conexão com banco de dados;

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = :ID"); //inserindo dados na tabela por parametros;

$id = 4;

$stmt->bindParam(":ID", $id);

$stmt->execute(); //Executando;

echo "Dado excluido com sucesso!"; //Exibindo Mensagem na tela;

?>