<?php

$conn = new mysqli("localhost", "root", "", "dbphp7");

if ($conn->connect_error){
  echo "Error: ".$conn->connect_error;
  exit;
}

$db = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES(?,?)");
$db->bind_param("ss", $login, $pass);

$login = "user";
$pass = "123456";

$db->execute();

$login = "root";
$pass = "!@#$";

$db->execute();

?>