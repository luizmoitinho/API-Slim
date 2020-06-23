<?php

namespace App\DAO\db_reservas_locais;
use App\Model\BlocoModel;

class BlocoDAO extends Conexao{

  public function getAllBlocos(){
    $blocos = $this->pdo
              ->query('SELECT id_bloco, nm_bloco
                      FROM tb_bloco')
              ->fetchAll(\PDO::FETCH_ASSOC);

    return $blocos;
  }

  public function insertBloco(BlocoModel $bloco){
    $statement = $this->pdo->prepare('INSERT INTO tb_bloco values(
                                    null, :nm_bloco)');

    $res = $statement->execute(array(
      'nm_bloco' => $bloco->getNmBloco()
    ));
    if($res)
      return True;
    return False;
  }

  public function updateBloco(BlocoModel $bloco){
    $statement = $this->pdo->prepare('UPDATE tb_bloco set nm_bloco= :nm_bloco
                                      WHERE id_bloco = :id_bloco');
    $res = $statement->execute(array(
      'nm_bloco'=>$bloco->getNmBloco(),
      'id_bloco'=>$bloco->getIdBloco()
    ));

    if($res)
      return $res;
    return $res;
  }

  public function deleteBloco(BlocoModel $bloco){
    $statement = $this->pdo->prepare('DELETE FROM tb_bloco 
                                      WHERE id_bloco = :id_bloco');

    $res = $statement->execute(array(
      'id_bloco'=>$bloco->getIdBloco()
    ));

    if($res)
      return True;
    return False;

final class BlocoDAO extends Conexao{
  
  public function getAllBlocos(){
    $blocos = $this->pdo->query('SELECT * FROM tb_bloco')
                        ->fetchAll(\PDO::FETCH_ASSOC); 
    return $blocos;                                     
  }

}