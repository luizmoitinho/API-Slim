<?php

namespace App\Model;

final class LocalModel{
  
  /**
   * @var int
   */
  private $id_local;
  /**
   * @var int
   */
  private $id_bloco;
  /**
   * @var string
   */
  private $nm_local;
  /**
   * @var string
   */
  private $desc_local;
  /**
   * @var string
   */
  private $img_local;

  /**
   * @return int
   */
  public function getIdLocal(){
    return $this->id_local; 
  }
  /**
   * @return int
   */
  public function getIdBloco(){
    return $this->id_bloco; 
  }
  /**
   * @return string
   */
  public function getNmLocal(){
    return $this->nm_local; 
  }
  /**
   * @return string
   */
  public function getDescLocal(){
    return $this->desc_local; 
  }
  /**
   * @return string
   */
  public function getImgLocal(){
    return $this->img_local; 
  }


  public function setIdLocal(int $id_local):LocalModel{
    $this->id_local = $id_local;
    return $this;
  }

  public function setIdBloco(int $id_bloco):LocalModel{
    $this->id_bloco = $id_bloco;
    return $this;
  }

  public function setNmLocal(string $nm_local):LocalModel{
    $this->nm_local = $nm_local;
    return $this;
  }

  public function setDescLocal(string $desc_local):LocalModel{
    $this->desc_local = $desc_local;
    return $this;
  }

  public function setImgLocal(string $img_local):LocalModel{
    $this->img_local = $img_local;
    return $this;
  }


}