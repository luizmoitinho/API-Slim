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
                                                                  :status_ativado);');
  
    $res = $statement->execute(array(
      'id_funcao'=>$usuario->getIdFuncao(),
      'id_departamento'=>$usuario->getIdDepartamento(),
      'nm_usuario'=>$usuario->getNmUsuario(),
      'tel_usuario'=>$usuario->getTelUsuario(),
      'email_usuario'=>$usuario->getEmailUsuario(),
      'matricula_usuario'=>$usuario->getMatUsuario(),
      'senha_usuario'=>$usuario->getSenhaUsuario(),
      'nv_acesso'=>$usuario->getNvAcesso(),
      'status_ativado'=>$usuario->getStatusUsuario(),
    ));
    if($res)
      return True;
    return False;

  }

  public function updateUsuario(UsuarioModel $usuario){

  }

  public function deleteUsuario(UsuarioModel $usuario){

  }

  public function isValidEmail(UsuarioModel $usuario){

    if(!empty($usuario->getIdUsuario())) {
      $statement =  $this->pdo
                    ->prepare(
                      'SELECT id_usuario from tb_usuario
                        WHERE email_usuario = :emailUsuario and id_usuario != :idUsuario;');

      $statement->execute(array(
        'emailUsuario'=>$usuario->getEmailUsuario(),
        'idUsuario'=>$usuario->getIdUsuario(),
      ));
                  
    }                         
    else{
      $statement =  $this->pdo
                         ->prepare('SELECT id_usuario from tb_usuario
                                    WHERE email_usuario = :emailUsuario;');
      $statement->execute(array(
      'emailUsuario'=>$usuario->getEmailUsuario(),
      ));

    }

    if($statement->rowCount()>0)
      return False;
    return True;
  }

  public function isValidMatricula(UsuarioModel $usuario){   

    if( !empty($usuario->getIdUsuario()) ) {
      $statement =  $this->pdo
                    ->prepare(
                      'SELECT id_usuario from tb_usuario
                        WHERE matricula_usuario = :matUsuario and id_usuario != :idUsuario;');

      $statement->execute(array(
        'matUsuario'=>$usuario->getMatUsuario(),
        'idUsuario'=>$usuario->getIdUsuario(),
      ));
                  
    }                         
    else{
      $statement =  $this->pdo
                        ->prepare('SELECT id_usuario from tb_usuario
                              WHERE matricula_usuario = :matUsuario;');

      $statement->execute(array(
      'matUsuario'=>$usuario->getMatUsuario(),
      ));

    }

    echo 'linhas>'.$statement->rowCount()>0;

    if($statement->rowCount()>0)
      return False;
    return True;

  }



}