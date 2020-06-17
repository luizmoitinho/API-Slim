<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\DAO\db_reservas_locais\DepartamentoDAO;
use App\Model\DepartamentoModel;


final class DepartamentoController{

  private $departamentoDAO;

  public function __construct(){
    $this->departamentoDAO =  new DepartamentoDAO();
  }

  public function getAllDepartamentos(Request $request, Response $response, array $args): Response{
   
    $departamentos =  $this->departamentoDAO->getAllDepartamentos();
    return $response->withJson($departamentos);

  }

  public function insertDepartamento(Request $request, Response $response, array $args): Response{
    $data =  $request->getParsedBody();

    $departamento =  new DepartamentoModel();
    $departamento->setNmDepartamento($data['nm_departamento']);
    
    $res = $this->departamentoDAO->insertDepartamento($departamento);
    if($res)
      return $response->withJson(['message'=>'Departamento cadastrado com sucesso']);

    return $response->withJson(['message'=>'Não foi possível cadastrar o departamento']);
    
  }

  public function updateDepartamento(Request $request, Response $response, array $args): Response{
      $data =  $request->getParsedBody();
      $departamento = new DepartamentoModel();

      $departamento->setIdDepartamento($data['id_departamento'])
                   ->setNmDepartamento($data['nm_departamento']);
      
      $res = $this->departamentoDAO->updateDepartamento($departamento);

      if($res)
        return $response->withJson(['message'=>'Departamento atualizado com sucesso']);

      return $response->withJson(['message'=>'Não foi possível atualizar o departamento']);
    
  }

  public function deleteDepartamento(Request $request, Response $response, array $args): Response{
    $data =  $request->getParsedBody();
  
    $departamento =  new DepartamentoModel();
    $departamento->setIdDepartamento($data['id_departamento']);
    
    $res = $this->departamentoDAO->deleteDepartamento($departamento);

    if($res)
      return $response->withJson(['message'=>'Departamento removido com sucesso']);

    return $response->withJson(['message'=>'Não foi possível remover o departamento']);
  
  }

}