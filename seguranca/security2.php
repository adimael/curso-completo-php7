<?php

$id = (isset($_GET["id"]))?$_GET["id"]:3;

if (!is_numeric($id) || strlen($id) > 5){
  exit("Pegamos você!");
}

$conn = mysql_connect("localhost", "root", "", "dbphp7");

$sql = "SELECT * FROM tb_usuarios WHERE idusuario = $id";

$exec = mysql_query($conn, $sql);

while ($resultado = mysql_fetch_object($exec)){
  var_dump($resultado);
}

?>