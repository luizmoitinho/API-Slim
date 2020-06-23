<?php

namespace App\DAO\db_reservas_locais;
use App\Model\FuncaoModel;

class FuncaoDAO extends Conexao{

  public function getAllFuncoes(){
    $funcoes =  $this->pdo
                ->query('SELECT id_funcao,nm_funcao from tb_funcao')
                  ->fetchAll(\PDO::FETCH_ASSOC);
    return $funcoes;
  }

  public function insertFuncao(FuncaoModel $funcao){
    $statement =  $this->pdo
                  ->prepare('INSERT INTO tb_funcao values (null, :nm_funcao)');
    $res = $statement->execute(array(
      'nm_funcao'=>$funcao->getNmFuncao()
     ));
    if($res)
      return True;
    return False;

  }

  public function updateFuncao(FuncaoModel $funcao){
    $statement = $this->pdo->prepare('UPDATE tb_funcao set nm_funcao = :nm_funcao WHERE id_funcao = :id_funcao');
    $res = $statement->execute(array(
      'nm_funcao'=> $funcao->getNmFuncao(),
      'id_funcao'=> intVal($funcao->getIdFuncao())
    ));

    if($res)
      return True;
    return False;
  } 

  public function deleteFuncao(FuncaoModel $funcao){
    $statement = $this->pdo->prepare('DELETE from tb_funcao WHERE id_funcao=:id_funcao');
    $res = $statement->execute(array(
      'id_funcao'=> $funcao->getIdFuncao()
    ));
    
    if($res)
      return True;
    return False;

  } 
  

}
