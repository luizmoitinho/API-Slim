<?php

namespace App\DAO\db_geren_lojas;

use App\Model\LojaModel;

class LojasDAO extends Conexao{

  public function __construct(){
    parent::__construct();
  
  }

  public function getAllLojas(): array{
    $lojas = $this->pdo
            ->query('SELECT id_loja,nm_loja,tel_loja,end_loja FROM tb_lojas')
            ->fetchAll(\PDO::FETCH_ASSOC);
    return $lojas;
  } 

  public function insertLoja(LojaModel $loja):void{
    $statement =  $this->pdo
                  ->prepare('INSERT INTO tb_lojas values (null, 
                                                          :nm_loja,
                                                          :tel_loja,
                                                          :end_loja);');

    $statement->execute([
      'nm_loja'=>$loja->getNmLoja(),
      'tel_loja'=>$loja->getTelLoja(),
      'end_loja'=>$loja->getEndLoja(),
    ]);

  

  }

}