<?php

namespace App\Model;

final class BlocoModel{

  private $id_bloco;
  private $nm_bloco;


  public function getIdBloco(){
    return $this->id_bloco;
  }

  public function getNmBloco(){
    return $this->nm_bloco;
  }

  public function setIdBloco(int $id): BlocoModel{
    $this->id_bloco = $id;
    return $this;
  }

  public function setNmBloco(string $nm_bloco):BlocoModel{
    $this->nm_bloco =  $nm_bloco;
    return $this;
  }

}
