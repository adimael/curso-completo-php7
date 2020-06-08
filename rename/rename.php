<?php

$dir1 = "folder_01";
$dir2 = "folder_02";

if (!is_dir($dir1)) mkdir($dir1);
if (!is_dir($dir2)) mkdir($dir2);

echo "As pastas ". $dir1 ." e ". $dir2 ." Foram criadas com sucesso!<br/>";

$filename = "README.txt";

if (!file_exists($dir1 . DIRECTORY_SEPARATOR . $filename)) {

  $file = fopen($dir1 . DIRECTORY_SEPARATOR . $filename, "w+");

  fwrite($file, date("Y-m-d H:i:s"));

  fclose($file);

}

echo "Arquivo " . $filename . " Criado com sucesso!<br/>"; 

rename(
  $dir1 . DIRECTORY_SEPARATOR . $filename, //Origem
  $dir2 . DIRECTORY_SEPARATOR . $filename //Destino
);

echo "Arquivo " . $filename . " movido com sucesso!"; 

?>