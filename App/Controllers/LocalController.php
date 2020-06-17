<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\db_reservas_locais\LocalDAO;
use App\Model\LocalModel;
use App\Util\Helpers;

final class LocalController{

  private $localDAO;

  public function __construct(){
    $this->localDAO = new LocalDAO();
  }

  public function getAllLocais(Request $request, Response $response, array $args): Response{
    $locais = $this->localDAO->getAllLocais();
    return $response->withJson($locais);
  }

  public function insertLocal(Request $request, Response $response, array $args): Response{

    $data =  $request->getParsedBody();
    $local = new LocalModel();
  
    $local->setIdBloco(intVal($data['id_bloco']))
          ->setNmLocal($data['nm_local'])
          ->setDescLocal($data['desc_local']);
    
    $errors = $this->isValidData($local);
    $imgLocal = Helpers::uploadImg('img_local');
    if($errors !== True)
      return $response->withJson($errors);  

    elseif(array_key_exists('code', $imgLocal))
      return $response->withJson(['message'=>'Erro no upload da imagem : '.$imgLocal['status']]);
    
    else{

      if($this->isValidNmLocal($local)){
        $local->setImgLocal($imgLocal[0]['file']);
        $res = $this->localDAO->insertLocal($local);
        if($res)
          return $response->withJson(['message'=>'Local cadastrado com sucesso']);
        return $response->withJson(['message'=>'Não foi possível cadastrar um novo local']);
      }else
        return $response->withJson(['message'=>'O nome do local já está em uso.']);
    }
   
  } 

  public function updateLocal(Request $request, Response $response, array $args): Response{
    
    var_dump($_FILES);
    return $response->withJson(['message'=>'TESTE']);

    $data =  $request->getParsedBody();
    $local = new LocalModel();
    $local->setIdLocal(intval($data['id_local']))
          ->setIdBloco(intVal($data['id_bloco']))
          ->setNmLocal($data['nm_local'])
          ->setDescLocal($data['desc_local']);

    $errors = $this->isValidData($local);
    $imgLocal = Helpers::uploadImg('img_local');
    if($errors !== True)
      return $response->withJson($errors);
    
    if(array_key_exists('code', $imgLocal)){
      return $response->withJson(['message'=>'Erro no upload da imagem : '.$imgLocal['status']]);
    }

    if($this->isValidNmLocal($local,1)){
      $res = $this->localDAO->updateLocal($local);
      if($res)
        return $response->withJson(['message'=>'Local atualizado com sucesso']);
      return $response->withJson(['message'=>'Não foi possível atualizar os dados do local']);
    }else
      return $response->withJson(['message'=>'O nome do local já está em uso.']);
    
  } 

  public function deleteLocal(Request $request, Response $response, array $args){
    $data = $request->getParsedBody();
  
    if(empty($data['id_local']) or !intval($data['id_local'])){
      return $response->withJson(['message'=>'Não foi possível remover o local cadastrado']);
    }else{
        $local =  new LocalModel();
        $local->setIdLocal($data['id_local']);
        $res = $this->localDAO->deleteLocal($local);
        if($res)
          return $response->withJson(['message'=>'O local foi removido com sucesso']);
        return $response->withJson(['message'=>'Não foi possível remover o local']);
    }
  }

  private function isValidNmLocal(LocalModel $local){
      if(empty($local->getIdLocal()))
        return $this->localDAO->isValidNmLocal($local);
      return $this->localDAO->isValidNmLocal_Id($local);
  }

  private function isValidData(LocalModel $local){
    $errors =  array();
    $this->validateIdBloco($local,$errors);
    $this->validateNmLocal($local,$errors);
    $this->validateNmLocal($local,$errors);   
    return count($errors) > 0 ? $errors:True;
  }

  private function validateIdBloco(LocalModel $local,array &$errors){
    if( empty($local->getIdBloco()))
      array_push($errors,'Deve ser selecionado um bloco.');
    elseif(!intval($local->getIdBloco()))
      array_push($errors,'Bloco informado é inválido');
  }

  private function validateNmLocal(LocalModel $local, array &$errors){
    if(empty($local->getNmLocal()))
      array_push($errors,'O nome do local deve ser preenchido');
    elseif(strlen($local->getNmLocal()) < 4)
      array_push($errors,'O nome do local deve ter no mínimo 4 caracteres');
  }

  private function validateDescLocal(LocalModel $local,array &$errors){
    if(empty($local->getNmLocal()))
      array_push($errors,'A descrição do local deve ser preenchida');
    elseif(strlen($local->getNmLocal()) < 6)
      array_push($errors,'A descrição do local deve ter no mínimo 6 caracteres');
  }





}
