<?php

$images = scandir("images");//scanner da pasta images;
$data = array();//Variavel de array;

foreach ($images as $img) {//Para cada arquivo;

  //condição
  if (!in_array($img, array(".", ".."))){
    $filename = "images" . DIRECTORY_SEPARATOR . $img;//buscando no diretorio;
    $info = pathinfo($filename);//Informações principais dos arquivos;
    $info["size"] = filesize($filename);//Tamanho dos arquivos;
    $info["modified"] = date("d/m/Y H:i:s", filemtime($filename));//Data de modificação;
    $info["url"] = "http://localhost/DIR/".str_replace("\\", "/", $filename);//endereço;

    array_push($data, $info);//adicionando as variaveis no final do array;

  }

}

echo json_encode($data);//Exibindo o JSON na tela;

?>