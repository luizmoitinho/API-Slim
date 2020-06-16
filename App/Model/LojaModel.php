<?php

namespace App\Model;

final class LojaModel{
  
  /** 
  * @var int
  */
  private $id_loja;
  /** 
  * @var string
  */
  private $nm_loja;
  /**
  * @var string
  */
  private $tel_loja;
  /** 
  * @var string
  */
  private $end_loja;

  /**
   * @return int
  */
  public function getIdLoja(){
    return $this->id_loja;
  }

  /**
   * @return string
  */
  public function getNmLoja(){
    return $this->nm_loja;
  }
  
  /**
   * @return string
  */
  public function getTelLoja(){
    return $this->tel_loja;
  }

  /**
   * @return string
  */
  public function getEndLoja(){
    return $this->end_loja;
  }

  public function setNmLoja($nm_loja): LojaModel{
    $this->nm_loja =  $nm_loja;
    return $this;
  }

  public function setTelLoja($tel_loja): LojaModel{
    $this->tel_loja = $tel_loja;
    return $this;
  }
  

  public function setEndLoja($end_loja): LojaModel{
    $this->end_loja = $end_loja;
    return $this;
  }
  

}
