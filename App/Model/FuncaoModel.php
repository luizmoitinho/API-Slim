<?php

namespace App\Model;

final class FuncaoModel{

  /**
   * @var int
  */
  private $id_funcao;
  
  /**
   * @var string
  */
  private $nm_funcao;


  /**
   * @return int
  */
  public function getIdFuncao(){
    return $this->id_funcao;
  }

  /**
   * @return string
  */
  public function getNmFuncao(){
    return $this->nm_funcao;
  }
  
  public function setIdFuncao(string $id_funcao): FuncaoModel{
    $this->id_funcao = $id_funcao;
    return $this;
  }


  public function setNmFuncao(string $nm_funcao): FuncaoModel{
    $this->nm_funcao = $nm_funcao;
    return $this;
  }

}