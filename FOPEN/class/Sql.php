<?php

class Sql extends PDO {//classe SQL extendida da classe PDO;

  private $conn;//Variável de conexão;
  
  public function __construct(){//função construtor para conexão automática;
    //Dados de conexão do banco de dados usando PDO;
    $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");

  }
  //Passando parâmetros para array;
  private function setParams($statement, $parameters = array()){
    //Foreach de parâmetro chave, valor;
    foreach ($parameters as $key => $value) {
      //Chamando método setParam passando chave e valor;
      $this->setParam($statement, $key, $value);
    }

  }

  private function setParam($statement, $key, $value){
    //recebendo parêmetro de chave e valor;
    $statement->bindParam($key, $value);

  }

  public function query($rawQuery, $params = array()){
    //Criando o statment, preparando variavel rawQuery;
    $stmt = $this->conn->prepare($rawQuery);

    //Chamando função setParams passando variavel stmt e params;
    $this->setParams($stmt, $params);

    $stmt->execute();//executando stmt;

    return $stmt;//retornando variável statement;

  }

  //Retornando valores no formato de array;
  public function select($rawQuery, $params = array()):array{
    //Recebendo variavel stmt;
    $stmt = $this->query($rawQuery, $params);
    //retornando o resultado com todos os dados;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

  }

}

?>