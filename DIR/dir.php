<?php

$name = "images";//nome da pasta

//condição caso o nome não existir;
if (!is_dir($name)) {
  //Comando para criar pasta;
  mkdir($name);
  echo "Diretório $name criado com sucesso!";

} else {//Se existir;
  //Comando para deletar pasta;
  rmdir($name);
  echo "O diretório: $name foi removido!";

}

?>