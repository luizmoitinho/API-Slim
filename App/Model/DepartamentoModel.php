<?php

namespace App\Model;

final class DepartamentoModel{

  /**
   * @var int
  */
  private $id_departamento;
  
  /**
   * @var string
  */
  private $nm_departamento;
  

  /**
   * @return int
  */
  public function getIdDepartamento(){
    return $this->id_departamento;
  }

  /**
   * @return string
  */
  public function getNmDepartamento(){
    return $this->nm_departamento;
  }

  public function setIdDepartamento(int $id_dep): DepartamentoModel{

    $this->id_departamento =  $id_dep;
    return $this;
  }

  public function setNmDepartamento(string $nm_dep): DepartamentoModel{
    $this->nm_departamento =  $nm_dep;
    return $this;
  }

}