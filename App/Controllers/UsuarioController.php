<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\db_reservas_locais\UsuarioDAO;
use App\Model\UsuarioModel;

final class UsuarioController{
  
  private $usuarioDAO;
  
  public function __construct(){
    $this->usuarioDAO =  new UsuarioDAO();
  }

  public function getAllUsuarios(Request $request,Response $response, array $args): Response{
    $usuarios =  $this->usuarioDAO->getAllUsuarios();
    return $response->withJson($usuarios);

  }

  public function insertUsuario(Request $request,Response $response, array $args): Response{
    $data = $request->getParsedBody();
    
    $usuario = new UsuarioModel();
    
    $usuario->setIdFuncao($data['id_funcao'])
            ->setIdDepartamento($data['id_departamento'])
            ->setNmUsuario(trim($data['nm_usuario']))
            ->setEmailUsuario(trim($data['email_usuario']))
            ->setTelUsuario(trim($data['tel_usuario']))
            ->setMatUsuario(trim($data['matricula_usuario']))
            ->setSenhaUsuario($data['senha_usuario']);

    $errors = $this->isValidData($usuarios);
    if($errors !== True){

    }
    return $response->withJson($errors); 
    

  }
  
  public function updateUsuario(Request $request,Response $response, array $args): Response{

  }

  public function deleteUsuario(Request $request,Response $response, array $args): Response{

  }

  private function isValidData(UsuarioModel $usuario){
    $errors =  array();
    $this->validateEmail($usuario,$errors);
    $this->validateMatricula($usuario,$errors);

    if(empty($usuario->getIdFuncao()))
      array_push($errors,'O campo função não foi selecionado.');
    if(empty($usuario->getIdDepartamento()))
      array_push($errors,'O campo departamento não foi selecionado.');
    if(empty($usuario->getTelUsuario()))
      array_push($errors,'O campo telefone não foi preenchido.');
    elseif(strlen($usuario->getTelUsuario()) >= 11)
     array_push($errors,'O campo telefone deve possuir no mínimo 11 digitos .');
    if(empty($usuario->getSenhaUsuario()) || empty($_POST['senha_confirm']))
      array_push($errors,'O campo senha deve ser preenchido.');
    elseif($usuario->getSenhaUsuario() !== $_POST['senha_confirm'])
      array_push($errors,'As senhas não são iguais.');

    return count($errors) > 0 ? $errors : True;
  }

  private function validateEmail(UsuarioModel $usuario, &$errors){
    if(empty($usuario->getEmailUsuario()))
      array_push($errors,'O campo e-mail deve ser preenchido.');

    elseif(filter_var($usuario->getEmailUsuario(), FILTER_VALIDATE_EMAIL))
      array_push($errors,'O e-mail preenchido não é válido.');

    elseif(empty($usuario->getIdUsuario())){
      if(!$this->usuarioDAO->isValidEmail($usuario))
        array_push($errors,'O e-mail preenchido já está em uso.');
    }

    else{
      if(!$this->usuarioDAO->isValidEmail_Id($usuario))
        array_push($errors,'O e-mail preenchido já está em uso.');
    }
  }

  private function vaidateMatricula(UsuarioModel $usuario, &$errors){

    if(empty($usuario->getMatUsuario()))
      array_push($errors,'O campo matrícula deve ser preenchido.');

    elseif(!int($usuario->getEmailUsuario()))
      array_push($errors,'O campo matrícula possui valores inválidos.');

    elseif(!$this->usuarioDAO->isValidMatricula())
      array_push($errors,'A matrícula preenchida já está em uso.');

  }

  
}
