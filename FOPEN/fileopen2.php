<?php

  require_once("config.php");

  $sql = new Sql();

  $usuarios = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

  $headers = array();

  foreach ($usuarios[0] as $key => $value) {
    array_push($headers, ucfirst($key));
  }

  $file = fopen("usuarios.csv", "w+");

  fwrite($file, implode(",", $headers) . "\r\n");

  foreach ($usuarios as $row) {

    $data = array();

    foreach ($row as $key => $value) {

      array_push($data, $value);

    }//End foreach the column

    fwrite($file, implode(",", $data) . "\r\n");

  }//end foreach of line 

  fclose($file);

?>