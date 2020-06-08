<?php

require_once("config.php");

use Client\Cadastro;

$cad = new Cadastro();

$cad->setNome("Adimael Santos");
$cad->setEmail("adimaelbr@gmail.com");
$cad->setSenha("123456");


$cad->registrarVenda();

?>