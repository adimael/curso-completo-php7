<?php
//Função de autoload;
spl_autoload_register(function($class_name){

  //Chamando o arquivo em diretório separado com extenção .php;
  $filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";
  //Condição para verificar se o arquivo existe;
  if (file_exists(($filename))){
    //Retornando o arquivo;
    require_once($filename);

  }

});

?>