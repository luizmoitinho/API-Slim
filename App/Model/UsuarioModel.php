<?php

namespace App\Model;

final class UsuarioModel{
  /** 
  * @var int
  */
  private $id_usuario;
  /** 
  * @var int
  */
  private $id_departamento;
  /** 
  * @var int
  */
  private $id_funcao;
  /** 
  * @var string
  */
  private $nm_usuario;
  /** 
  * @var string
  */
  private $tel_usuario;
  /** 
  * @var string
  */
  private $email_usuario;
  /** 
  * @var int
  */
  private $matricula_usuario;
  /** 
  * @var string
  */
  private $senha_usuario;
    /** 
  * @var string
  */
  private $senha_confirm;
  /** 
  * @var int
  */
  private $nv_acesso;
  /** 
  * @var string
  */
  private $status_ativado;


  public function __construct(){
    $this->nv_acesso = 4;
    $this->status_ativado = 'N';
  
  }

  /** 
  * @return int
  */
  public function getIdUsuario(){
    return $this->id_usuario;

  }
  /** 
  * @return int
  */
  public function getIdFuncao(){
    return $this->id_funcao;

  }
  /** 
  * @return int
  */
  public function getIdDepartamento(){
    return $this->id_departamento;

  }
  /** 
  * @return string
  */
  public function getNmUsuario(){
    return $this->nm_usuario;

  } 
  /** 
  * @return string
  */
  public function getEmailUsuario(){
    return $this->email_usuario;

  }
  /** 
  * @return string
  */
  public function getMatUsuario(){
    return $this->matricula_usuario;
  }
  /** 
  * @return string
  */

  public function getTelUsuario(){
    return $this->tel_usuario;
  }
  /** 
  * @return string
  */
  public function getSenhaUsuario(){
    return $this->senha_usuario;
  }
  /** 

  * @return string
  */
  public function getSenhaConfirmUsuario(){
    return $this->senha_confirm;
  }
  /** 

  * @return int
  */
  public function getNvAcesso(){
    return $this->nv_acesso;
  }
  /** 
  * @return string
  */
  public function getStatusUsuario(){
    return $this->status_ativado;
  }
  
  
  public function setIdUsuario(int $id_usuario): UsuarioModel{
    $this->id_usuario = $id_usuario;
    return $this;
  }

  public function setIdFuncao(int $id_funcao): UsuarioModel{
    $this->id_funcao = $id_funcao;
    return $this;
  }

  public function setIdDepartamento(int $id_departamento): UsuarioModel{
    $this->id_departamento = $id_departamento;
    return $this;
  }

  public function setNmUsuario(string $nm_usuario): UsuarioModel{
    $this->nm_usuario = $nm_usuario;
    return $this;
  }

  public function setEmailUsuario(string $email_usuario): UsuarioModel{
    $this->email_usuario = $email_usuario;
    return $this;
  }

  public function setTelUsuario(string $tel_usuario): UsuarioModel{
    $this->tel_usuario = $tel_usuario;
    return $this;
  }

  public function setMatUsuario(int $matricula_usuario): UsuarioModel{
    $this->matricula_usuario = $matricula_usuario;
    return $this;
  }

  
  public function setSenhaUsuario(string $senha_usuario): UsuarioModel{
    $this->senha_usuario = $senha_usuario;
    return $this;
  }
  
  public function setSenhaConfirmUsuario(string $senha_confirm): UsuarioModel{
    $this->senha_confirm = $senha_confirm;
    return $this;
  }


  public function setNvAcesso(int $nv_acesso): UsuarioModel{
    $this->nv_acesso = $nv_acesso;
    return $this;
  }

  public function setStatusUsuario(string $status_ativado): UsuarioModel{
    $this->status_ativado = $status_ativado;
    return $this;
  }
  

}