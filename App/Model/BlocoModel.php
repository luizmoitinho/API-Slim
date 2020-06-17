<?php

namespace App\Model;

final class BlocoModel{

  /**
   * @var int
  */
  private $id_bloco;

  /**
   * @var string
  */
  private $nm_bloco;

  /**
   * @return int
  */
  public function getIdBloco(){
    return $this->id_bloco;
  }

  /**
   * @return string
  */
  public function getNmBloco(){
    return $this->nm_bloco;
  }

  public function setIdBloco(int $id_bloco): BlocoModel{
    $this->id_bloco = $id_bloco;
    return $this;
  }

  public function setNmBloco(string $nm_bloco): BlocoModel{
    $this->nm_bloco = $nm_bloco;
    return $this;
  }
}