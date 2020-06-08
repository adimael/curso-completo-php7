<?php

  namespace Client;


  class Cadastro extends \Cadastro{

    public function registrarVenda(){
      echo "Foi registrada uma venda para o cliente ".$this->getNome();
    }
  }

?>