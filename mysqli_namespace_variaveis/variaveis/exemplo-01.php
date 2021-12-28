<?php

$_nome = "Hcode";

//echo $nome;

var_dump($_nome);

$qualsuaidade = 10;

$idadeCrianca = 12;
$idadeMaior = 18;
$idadeMelhor = 65;

echo "<br>";

if ($qualsuaidade < $idadeCrianca) {
  echo "Criança";
} else if ($qualsuaidade < $idadeMaior){
  echo "Adolencente";
} else if ($qualsuaidade < $idadeMelhor){
  echo "Adulto";
} else{
  echo "Idoso";
}

?>