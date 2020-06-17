<?php

namespace App\DAO\db_reservas_locais;
use App\Model\DepartamentoModel;

class DepartamentoDAO extends Conexao{


  public function getAllDepartamentos(){
    $departamentos = $this->pdo
                    ->query('SELECT id_departamento,nm_departamento
                            FROM tb_departamento')
                    ->fetchAll(\PDO::FETCH_ASSOC);

    return $departamentos;
  }

  
  public function insertDepartamento(DepartamentoModel $departamento){

    $statement =  $this->pdo->prepare('INSERT INTO tb_departamento values(
                                      null, :nm_departamento)');
    $res = $statement->execute(array(
      'nm_departamento' => $departamento->getNmDepartamento()
    ));
    if($res)
      return True;
    return False;

  }

  public function updateDepartamento(DepartamentoModel $departamento){
    $statement = $this->pdo->prepare('UPDATE tb_departamento set nm_departamento= :nm_departamento
                                    WHERE id_departamento =:id_departamento');
    $res = $statement->execute(array(
      'nm_departamento'=>$departamento->getNmDepartamento(),
      'id_departamento'=>$departamento->getIdDepartamento()
    ));

    if($res)
      return $res;
    return $res;

  }

  public function deleteDepartamento(DepartamentoModel $departamento){
    $statement = $this->pdo->prepare('DELETE FROM tb_departamento WHERE id_departamento = :id_departamento');

    $res = $statement->execute(array(
      'id_departamento'=>$departamento->getIdDepartamento()
    ));
    if($res)
      return True;
    return False;
    
  }





}
