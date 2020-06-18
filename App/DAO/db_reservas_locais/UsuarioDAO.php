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

  public function getUserById(UsuarioModel $usuario){
    $statement = $this->pdo
                     ->prepare('SELECT id_usuario,id_funcao,id_departamento,nm_usuario,tel_usuario,email_usuario,
                                        matricula_usuario,status_ativado,nv_acesso
                              FROM tb_usuario WHERE id_usuario = :idUsuario and  matricula_usuario = :matUsuario;');
    
    $res = $statement->execute(array(
      'idUsuario'=>$usuario->getIdUsuario(),
      'matUsuario'=>$usuario->getMatUsuario()
    ));

    if($res){
      return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    return False;
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
    $statement =  $this->pdo
                       ->prepare('UPDATE tb_usuario set id_funcao = :idFuncao,
                                                        id_departamento =  :idDepartamento,
                                                        nm_usuario = :nmUsuario,
                                                        tel_usuario = :telUsuario,
                                                        email_usuario = :emailUsuario,
                                                        matricula_usuario = :matUsuario,
                                                        nv_acesso = :nvAcesso,
                                                        status_ativado = :statusAtivado
                                  WHERE id_usuario = :idUsuario');

    $res =  $statement->execute(array(
      'idFuncao'=>$usuario->getIdFuncao(),
      'idDepartamento'=>$usuario->getIdDepartamento(),
      'nmUsuario'=>$usuario->getNmUsuario(),
      'telUsuario'=>$usuario->getTelUsuario(),
      'emailUsuario'=>$usuario->getEmailUsuario(),
      'matUsuario'=>$usuario->getMatUsuario(),
      'nvAcesso'=>$usuario->getNvAcesso(),
      'statusAtivado'=>$usuario->getStatusUsuario(),
      'idUsuario'=>$usuario->getIdUsuario()
    ));

    if($res)
      return True;
    return False;
  }



  public function deleteUsuario(UsuarioModel $usuario){
    $statement =  $this->pdo->prepare('DELETE FROM tb_usuario 
                                       WHERE id_usuario = :idUsuario;');

    $res = $statement->execute(array(
      'idUsuario' => $usuario->getIdUsuario()
    ));

    if($res)
      return True;
    return False;
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

    if($statement->rowCount()>0)
      return False;
    return True;

  }

  public function isValidUserById(UsuarioModel $usuario){
    $statement =  $this->pdo
                        ->prepare('SELECT id_usuario from tb_usuario
                                    WHERE id_usuario = :idUsuario;');

    $statement->execute(array(
    'idUsuario'=>$usuario->getIdUsuario(),
    ));

    if($statement->rowCount()>0)
      return True;
    return False;

  }


}