<?php

namespace App\DAO\db_reservas_locais;
use App\Model\BlocoModel;


final class BlocoDAO extends Conexao{
  
  public function getAllBlocos(){
    $blocos = $this->pdo->query('SELECT * FROM tb_bloco')
                        ->fetchAll(\PDO::FETCH_ASSOC); 
    return $blocos;                                     
  }

  public function insertBloco(BlocoModel $bloco){
    
    
  }
}