<?php

$conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", ""); //Configuração de conexão com banco de dados;

$conn->beginTransaction();

$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?"); //inserindo dados na tabela por parametros;

$id = 1;

$stmt->execute(array($id)); //Executando;

//$conn->rollback();
$conn->commit();

echo "Dado excluido com sucesso!"; //Exibindo Mensagem na tela;

?>