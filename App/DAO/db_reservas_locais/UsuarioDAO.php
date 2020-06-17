<?php

namespace App\DAO\db_reservas_locais;
use App\Model\UsuarioModel;

final class UsuarioDAO extends Conexao{

  public function getAllUsuarios(){
    $usuarios = $this->pdo
                      ->query('SELECT id_usuario,id_funcao,id_departamento,nm_usuario,matricula_usuario,status_ativado
                                FROM tb_usuario;')
                      ->fetchAll(\PDO::FETCH_ASSOC);
    return $usuarios;
  }

  public function insertUsuario(UsuarioModel $usuario){
    $statement =  $this->pdo
                        ->prepare('INSERT INTO tb_usuario values (null, :id_funcao,
                                                                  :id_departamento,
                                                                  :nm_usuario,
                                                                  :tel_usuario,
                                                                  :email_usuario,
                                                                  :matricula_usuario,
                                                                  :senha_usuario,
                                                                  :nv_acesso,
                                                                  :status_ativado');
  
  $statement->execute(array(
    ''
  ));

  }

  public function updateUsuario(UsuarioModel $usuario){

  }

  public function deleteUsuario(UsuarioModel $usuario){

  }

  public function isValidEmail(UsuarioModel $usuario){
    $statement = $this->pdo     
                      ->prepare('SELECT id_usuario from tb_usuario
                            WHERE email_usuario = :emailUsuario');
   
   $statement->execute(array(
    'emailUsuario'=>$usuario->getEmailUsuario()
    ));

    if($statement->rowCount()>0)
      return False;
    return True;
  }

  public function isValidEmail_Id(UsuarioModel $usuario){
    $statement = $this->pdo     
                      ->prepare('SELECT id_usuario from tb_usuario
                            WHERE id_usuario != :idUsuario and email_usuario = :emailUsuario');
   
   $statement->execute(array(
    'idUsuario'=>$usuario->getIdUsuario(),
    'emailUsuario'=>$usuario->getEmailUsuario()
    ));

    if($statement->rowCount()>0)
      return False;
    return True;
  }

  public function isValidMatricula(UsuarioModel $usuario){
    $statement =  $this->pdo
                        ->prepare('SELECT id_usuario from tb_usuario
                                  WHERE matricula_usuario = :matUsuario');
                            

    $statement->execute(array(
      'matUsuario'=>$usuario->getMatUsuario()
    ));

    if($statement->rowCount()>0)
      return False;
    return True;

  }



}