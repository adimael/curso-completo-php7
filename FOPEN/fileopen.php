<?php

  $file = fopen("log.txt", "a+");//Variavel para criar o arquivo log.txt;
  fwrite($file, date("Y-m-d H:i:s" . "\r\n"));//Escrever dentro do arquivo;
  fclose($file);//Finalizar o processo;

  echo "Arquivo criado com sucesso!";


?>