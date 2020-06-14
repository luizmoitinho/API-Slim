<?php

namespace App\DAO\db_geren_lojas;

class LojasDAO extends Conexao{

  public function __construct(){
    parent::__construct();
  
  }

  public function getAll(){
    $lojas = $this->pdo->query('SELECT * FROM tb_lojas;')->fetchAll(\PDO::FETCH_ASSOC);  
    echo "<pre>";
    foreach($lojas as $loja)
      var_dump($loja);
    die;

  }

}