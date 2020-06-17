<?php

namespace App\DAO\db_reservas_locais;

abstract class Conexao{
  
  /*
  * @var \PDO
  */
  protected $pdo;

  public function __construct(){
    try{
      $host = getenv('db_reserva_locais_MYSQL_HOST');
      $port = getenv('db_reserva_locais_MYSQL_PORT');
      $user = getenv('db_reserva_locais_MYSQL_USER');
      $pass = getenv('db_reserva_locais_MYSQL_PASSWORD');
      $dbname = getenv('db_reserva_locais_MYSQL_DBNAME');
      $dsn = "mysql:host={$host};dbname={$dbname};port={$port};";
      $this->pdo = new \PDO($dsn,$user,$pass);
      //$this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }catch(Exception $e){
      echo 'Erro ao conectar ao banco de dados';
    }
   
  }

}