<?php

class User {//Criação da classe usuário;

  private $idusuario;
  private $deslogin;
  private $dessenha;
  private $dtcadastro;

  //Criando as funções Getters;
  public function getIdusuario(){
    return $this->idusuario;
  }
  public function getDeslogin(){
    return $this->deslogin;
  }
  public function getDessenha(){
    return $this->dessenha;
  }
  public function getDtcadastro(){
    return $this->dtcadastro;
  }

  //Criando as funções Setters;
  public function setIdusuario($value){
    $this->idusuario = $value;
  }
  public function setDeslogin($value){
    $this->deslogin = $value;
  }
  public function setDessenha($value){
    $this->dessenha = $value;
  }
  public function setDtcadastro($value){
    $this->dtcadastro = $value;
  }
  //Função para carregar os dados pelo id;
  public function loadById($id){

    $sql = new Sql();

    //Selecionando todos os ID da tabela tb_usuarios;
    $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
      ":ID"=>$id
    ));

    //Validando se realmente o ID existe;
    if (count($results) > 0){

      $this->setData($results[0]);//Pegando posição 0;

    }

  }

  //Metódo para retorna todos os usuários da tabela do banco de dados;
  public static function getList(){

    $sql = new Sql();

    return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");

  }

  //Metódo para buscar usuário;
    public static function search($login){

      $sql = new Sql();

      return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY delogin", array(
        ':SEARCH'=>"%".$login."%"
      ));

    }

    //Obter dados autenticados
    public function login($login, $password){

      $sql = new Sql();

    //Selecionando todos os Login e senha da tabela tb_usuarios;
    $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
      ":LOGIN"=>$login,
      ":PASSWORD"=>$password
    ));

    //Validando se realmente o ID existe;
    if (count($results) > 0){

      $this->setData($results[0]);//Pegando posição 0;

    }else {
      throw new Exception("Login e/ou senha inválidos.");
    }

    }

    public function setData($data){

      //mandando os dados para os setters;
      $this->setIdusuario($data['idusuario']);
      $this->setDeslogin($data['deslogin']);
      $this->setDessenha($data['dessenha']);
      $this->setDtcadastro(new DateTime($data['dtcadastro']));

    }

    public function insert(){

      $sql = new Sql();

      $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
        ':LOGIN'=>$this->getDeslogin(),
        ':PASSWORD'=>$this->getDessenha()
      ));

      if (count($results) > 0){
        $this->setData($results[0]);//Pegando posição 0;
      }

    }

    public function update($login, $password){

      $this->setDeslogin($login);
      $this->setDessenha($password);

      $sql = new Sql();

      $sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", array(
        ':LOGIN'=>$this->getDeslogin(),
        ':PASSWORD'=>$this->getDessenha(),
        ':ID'=>$this->getIdusuario()
      ));

    }

    public function delete(){
      $sql = new Sql();

      $sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
        ':ID'=>$this->getIdusuario()
      ));

      $this->setIdusuario(0);
      $this->setDeslogin("");
      $this->setDessenha("");
      $this->setDtcadastro(new DateTime());

    }

    public function __construct($login = "", $password = ""){
      $this->setDeslogin($login);
      $this->setDessenha($password);
    }

  //Criando função com Método Mágico;
  public function __toString(){
    //Retornando resultado em JSON;
    return json_encode(array(
      "idusuario"=>$this->getIdusuario(),
      "deslogin"=>$this->getDeslogin(),
      "dessenha"=>$this->getDessenha(),
      "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
    ));
  }

}

?>