<?php

namespace App\DAO\db_reservas_locais;
use App\Model\LocalModel;

final class LocalDAO extends Conexao{
  
  public function getAllLocais(){
    $locais =  $this->pdo
                       ->query('SELECT * FROM tb_local')
                       ->fetchAll(\PDO::FETCH_ASSOC);
    
    return $locais;
  }

  public function insertLocal(LocalModel $local){
    $statement =  $this->pdo  
                        ->prepare('INSERT INTO tb_local values
                                 (null, :id_bloco, :nm_local,:desc_local,
                                  :img_local);');

    $res =  $statement->execute(array(
        'id_bloco'=>$local->getIdBloco(),
        'nm_local'=>$local->getNmLocal(),
        'desc_local'=>$local->getDescLocal(),
        'img_local'=>$local->getImgLocal()
    ));

    if($res)
      return True;
    return False;
  }

  public function updateLocal(LocalModel $local){
    $statement =  $this->pdo  
                       ->prepare('UPDATE tb_local set id_bloco   = :idBloco,
                                                      nm_local   = :nmLocal,
                                                      desc_local = :descLocal,
                                                      img_local  = :imgLocal
                              WHERE id_local = :idLocal ');

      $res =  $statement->execute(array(
            'idBloco'=>intval($local->getIdBloco()),
            'nmLocal'=>$local->getNmLocal(),
            'descLocal'=>$local->getDescLocal(),
            'imgLocal'=>$local->getImgLocal(),
            'idLocal' =>intval($local->getIdLocal())
      ));

      if($res)
        return True;
      return False;

  }

  public function deleteLocal(LocalModel $local){
    $statement = $this->pdo     
                      ->prepare('DELETE from tb_local
                                WHERE id_local = :idLocal');
    $res =  $statement->execute(array(
      'idLocal' => intval($local->getIdLocal())
    ));
    if($statement->rowCount()==1)
      return True;
    return False;
  
  }

  public function isValidNmLocal_Id(LocalModel $local){
    $statement =  $this->pdo      
                        ->prepare('SELECT id_local from tb_local
                                   WHERE id_local != :idLocal and nm_local = :nmLocal');
    
    $statement->execute(array(
      'idLocal'=>$local->getIdLocal(),
      'nmLocal'=>$local->getNmLocal()
    ));

    if($statement->rowCount() > 0)
      return False;
    return True;
  }

  public function isValidNmLocal(LocalModel $local){
    $statement =  $this->pdo      
                        ->prepare('SELECT id_local from tb_local
                                   WHERE nm_local = :nmLocal');
    
    $statement->execute(array(
      'nmLocal'=>$local->getNmLocal()
    ));

    if($statement->rowCount() > 0)
      return False;
    return True;

  }



}

